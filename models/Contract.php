<?php

enum ContractType: string
{
    case COMPTE_COURANT = 'Compte courant';
    case COMPTE_EPARGNE = 'Compte épargne';
}



class Contract
{
    private int $id;
    private ContractType $type;

    private int $cost;

    private float $balance;


    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setType(ContractType $type)
    {
        $this->type = $type;
    }

    public function setCost(float $cost)
    {
        $this->cost = $cost;
    }














}

