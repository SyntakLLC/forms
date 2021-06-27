<?php

namespace App\Subscription;

use Spark\Events\SubscriptionCreated;
use Spark\Spark;

class CreateSubscription extends \Spark\Actions\CreateSubscription {
    public function create($billable, $plan, array $options = [])
    {
        $type = $billable->sparkConfiguration('type');

        $planObject = Spark::plans($type)
            ->where('id', $plan)
            ->first();

        $this->purgeOldSubscriptions($billable);

        $builder = $billable->newSubscription('default', $plan);

        if ($planObject->trialDays) {
            $builder->trialDays($planObject->trialDays);
        }

        if (isset($options['coupon'])) {
            $stripeKey = config('cashier.secret');
            $promoCode = $options['coupon'];
            $stripe = new \Stripe\StripeClient($stripeKey);
            $result=$stripe->promotionCodes->all(
                ['code'=>$promoCode,'active'=>true]
            );
            $promoID=$result->first()->id;
            $builder->withPromotionCode($promoID);
        }

        if (Spark::chargesPerSeat($type)) {
            $builder->quantity(Spark::seatCount($type, $billable));
        }

        $subscription = $this->createSubscriptionViaStripe($builder);

        if ($subscription &&
            ($subscription->onTrial() || $subscription->active())) {
            event(new SubscriptionCreated($billable));

            $billable->update(['trial_ends_at' => null]);
        }
    }
}
