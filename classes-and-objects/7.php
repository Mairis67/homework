<?php

class Dog
{
    private string $name;
    private string $sex;
    private ?string $mother = NULL;
    private ?string $father = NULL;


    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function getFather(string $father): void
    {
        $this->father = $father;
    }

    public function getMother(string $mother): string
    {
        return $this->mother = $mother;
    }

    public function fathersName(): void
    {
        if ($this->father === NULL) {
            echo 'Unknown' . PHP_EOL;
        } else {
            echo $this->father . PHP_EOL;
        }
    }

    public function hasSameMotherAs(Dog $two): bool
    {
        if ($this->mother === $two->mother) {
            return true;
        }
        return false;
    }

}

class DogTest
{
    private Dog $max;
    private Dog $rocky;
    private Dog $sparky;
    private Dog $buster;
    private Dog $sam;
    private Dog $lady;
    private Dog $molly;
    private Dog $coco;


    public function __construct()
    {
        $this->max = new Dog('Max', 'male');
        $this->rocky = new Dog('Rocky', 'male');
        $this->sparky = new Dog('Sparky', 'male');
        $this->buster = new Dog('Buster', 'male',);
        $this->sam = new Dog('Sam', 'male');
        $this->lady = new Dog('Lady', 'female');
        $this->molly = new Dog('Molly', 'female');
        $this->coco = new Dog('Coco', 'female');
    }

    public function addMaxFather()
    {
        $this->max->getFather('Rocky');
    }

    public function addRockyFather()
    {
        $this->rocky->getFather('Sam');
    }

    public function addBusterFather()
    {
        $this->buster->getFather('Sparky');
    }

    public function addCocoFather()
    {
        $this->coco->getFather('Buster');
    }

    public function addMaxMother()
    {
        $this->max->getMother('Lady');
    }

    public function addCocoMother()
    {
        $this->coco->getMother('Molly');
    }

    public function addRockyMother()
    {
        $this->rocky->getMother('Molly');
    }

    public function addBusterMother()
    {
        $this->buster->getMother('Lady');
    }

    public function checkCoco()
    {
        $this->coco->fathersName();
    }

    public function checkSparky()
    {
        $this->sparky->fathersName();
    }

    public function checkMother(): bool
    {
        return $this->coco->hasSameMotherAs($this->rocky);
    }
}

$dogTest = new DogTest();
$dogTest->addCocofather();
$dogTest->addMaxFather();
$dogTest->addRockyFather();
$dogTest->addBusterFather();
$dogTest->addMaxMother();
$dogTest->addRockyMother();
$dogTest->addBusterMother();
$dogTest->addCocoMother();
$dogTest->checkCoco();
$dogTest->checkSparky();
var_dump($dogTest->checkMother());




