<?php

use Illuminate\Database\Seeder;

class CreateUserParentChildrenSeeder extends Seeder
{
    /**
     * созадание тестовых данных
     *
     */
    public function run()
    {

        $parent = $this->createParent();
        $parent->user->password = 123;
        $parent->user->save();

        $children = [
            $this->createChild(),
            $this->createChild(),
        ];

        foreach ($children as $child) {

            $parent->children()->save($child);
            /**
             * @var $child \App\Models\Child
             */
            $this->createEventsForCard($child->card_number);
        }


    }

    /**
     * @return \App\Models\Tariff
     */
    private function createTariff()
    {
        $tariff = \App\Models\Tariff::create([

        ]);

        return $tariff;
    }

    /**
     * @return \App\Models\ParentModel
     */
    private function createParent()
    {
        $tariff = $this->createTariff();
        $parentRepository = new \App\Models\Repositories\ParentRepository();
        return $parentRepository->create([
            'telephone' => 88002000600,
            'fio' => 'Иванов Иван Иванович',
            'account' => 999,
            'tariff_id' => $tariff->id,
            'phone_type_id' => 1,
        ]);
    }

    private function createChild()
    {
        return \App\Models\Child::create([
            'fio' => 'Ребенок Иванова ' . rand(1, 10000),
            'class' => rand(1, 11),
            'class_char' => 'A',
            'card_number' => rand(1000, 99999),
            'city' => 'Кемерово',
            'school_number' => rand(10, 100),
        ]);
    }

    private function createEventsForCard($cardNumber)
    {
        \App\Models\Event::create([
            'card_number' => $cardNumber,
            'event_type_id' => \App\Models\Event::TYPE_ENTER,
        ]);

        \App\Models\Event::create([
            'card_number' => $cardNumber,
            'event_type_id' => \App\Models\Event::TYPE_EXIT,
        ]);
    }
}
