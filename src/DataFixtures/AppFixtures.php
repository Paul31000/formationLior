<?php

namespace App\DataFixtures;

use App\Factory\CustomerFactory;
use App\Factory\InvoiceFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $customerFac=CustomerFactory::new();
        $userFac=UserFactory::new();
        for ($j=0;$j<rand(3,5);$j++){
            $user=$userFac -> createOne();
            $chrono=0;
            for ($i=0;$i<rand(2,4);$i++){
                $customer=$customerFac -> createOne(['User' => $user]);
                $invoiceFac=InvoiceFactory::new();
                for ($k=0;$k<rand(1,3);$k++){
                    $chrono++;
                    $invoiceFac -> createOne(['Customer' => $customer, "chrono" => $chrono]);
                }
            }
        }

    }
}
