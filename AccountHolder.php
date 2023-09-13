
<?php

    Class AccountHolder {
        private string $firstName;
        private string $lastName;
        private DateTime $birthday;
        private string $location;
        
        private $bankAccounts = [];

        public function __construct( string $firstName, string $lastName, string $birthday, $location ) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->birthday = new \Datetime($birthday);
            $this->location = $location;

            $this->bankAccounts = [];

           
        }

         // Getter et Setter
        public function getFirstName(): string
        {
            return $this->firstName;
        }
        public function setFirstName(string $firstName)
        {
            $this->firstName = $firstName;
        }

        public function getLastName(): string
        {
            return $this->lastName;
        }
        public function setLastName(string $lastName)
        {
            $this->lastName = $lastName;
        }
        
        public function getBirthday(): Datetime
        {
            return $this->birthday;
        }
        public function setBirthday(Datetime $birthday)
        {
            $this->birthday = $birthday;
        }

        public function getLocation(): string
        {
            return $this->location;
        }
        public function setLocation(string $location)
        {
            $this->location = $location;
        }




        public function addBankAccount(BankAccount $bankAccount)
        {
            $this->bankAccounts[] = $bankAccount;
        }

        public function getBankAccount() : array 
        {
            return $this->bankAccounts;
        }



        public function __toString() {
            $result_accountHolder = $this->firstName . " - " . $this->lastName; 
            return $result_accountHolder;
        }

        public function displayAccountHolder() {
            $result_accountHolder = 
            $this . '<br>' // recup des infos générées par la toString
            .$this->birthday->format('d - m - Y') . '<br>'
            .$this->location . '<br> Compte/s Bancaire/s: <br>';
            

            foreach ($this->bankAccounts as $bankAccount) {
                        $result_accountHolder .=
                        
                        ' - ' . $bankAccount->getAccountNumber() 
                        .$bankAccount->getInitilaBankBalance() . ' ' .$bankAccount->getCurrency() . '<br>';
                     }

            return $result_accountHolder;

        }


    }

?>