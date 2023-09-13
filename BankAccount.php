

<?php

Class BankAccount
{
    private string $accountNumber;
    private int $initilaBankBalance;
    private string $currency;

    private AccountHolder $accountHolder;

    public function __construct (string $accountNumber, int $initilaBankBalance, string $currency, AccountHolder $accountHolder) {
        $this->accountNumber = $accountNumber;
        $this->initilaBankBalance = $initilaBankBalance;
        $this->currency = $currency;
        $this->accountHolder = $accountHolder;

         // utilisées pour établir une relation bidirectionnelle entre les objets accountholder et bankaccount
         $this->accountHolder->addBankAccount($this);
         

    }

  
  
    // Getter et Setter
    public function getAccountNumber(): string
        {
            return $this->accountNumber;
        }
        public function setAccountNumber(string $accountNumber)
        {
            $this->accountNumber = $accountNumber;
        }


        public function getInitilaBankBalance(): int
        {
            return $this->initilaBankBalance;
        }
        public function setInitilaBankBalance(int $initilaBankBalance)
        {
            $this->initilaBankBalance = $initilaBankBalance;
        }


        public function getCurrency(): string
        {
            return $this->currency;
        }
        public function setCurrency(string $currency)
        {
            $this->currency = $currency;
        }

        public function getAccountHolder(): AccountHolder
        {
            return $this->accountHolder;
        }
        public function setAccountHolder(AccountHolder $accountHolder)
        {
            $this->accountHolder = $accountHolder;
        }



        // Action pour crediter / débité / faire un virement
        public function creditAccount($amount) {
            $this->initilaBankBalance += $amount;
        }

        public function debitAccount($amount) {
            if ($amount <= $this->initilaBankBalance) {
                $this->initilaBankBalance -= $amount;
            } else {
            // gérer les cas où il n'y a pas assez pour débiter X montant
            echo "Action rejetée, vous êtes sans le sou!";
        }
        }

        public function transferTo($recipientAccount, $amount) {
            if ($amount <= $this->initilaBankBalance) {
                $this->debitAccount($amount); // débit du compte
                $recipientAccount->creditAccount($amount); // credit sur l'autre compte
            } else {
                echo "Action rejetée, vous êtes sans le sou!";
            }
        }


        public function __toString() {
           
            $result_bankAccount = 
            $this->accountNumber . '<br>'
            .$this->initilaBankBalance . " " . $this->currency;
            return $result_bankAccount;
        }


        public function displayBankAccount() {
            $result_bankAccount =
            $this . '<br>'
            // .$this->accountHolder->getFirstName(). ' - ' . $this->accountHolder->getLastName() . '<br>' ;
            .$this->accountHolder ; // simplification en utlisant la ToString des comptes du client

            return $result_bankAccount;
            
        }

}

?>

