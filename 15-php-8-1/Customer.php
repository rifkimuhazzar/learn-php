<?php

interface SayHello {
  function sayHello(): string;
}

trait IndonesiaGender {
  function inIndonesia(): string {
    return match($this) {
      Gender::Male => "Tuan",
      Gender::Female => "Nyonya"
    };
  }
}

// enum hanya bisa mewariskan interface dan trait
enum Gender: string implements sayHello {
  use IndonesiaGender;

  case Male = "Mr.";
  case Female = "Mrs.";

  const Unknown = "Unknown";

  static function fromIndonesia(string $value): Gender {
    return match ($value) {
      "Tuan" => Gender::Male,
      "Nyonya" => Gender::Female,
      default => throw new Exception("Unsupported Indonesian value")
    };
  }

  function sayHello(): string {
    return "Hello " . $this->value;
  }
}

class Customer {

  // public string $id;
  // public string $name;
  // public Gender $gender;

  public function __construct(public string $id, 
                              public string $name, 
                              public ?Gender $gender) {
    // $this->id = $id;
    // $this->name = $name;
    // $this->gender = $gender;
  }

}

function sayHello(Customer $customer) {
  // if ($customer->gender == Gender::Male) {
  //   return "Hello Mr." . $customer->name;
  // } else if ($customer->gender == Gender::Female) {
  //   return "Hello Mrs." . $customer->name;
  // } else {
  //   return "Hello " . $customer->name;
  // }

  if ($customer->gender == null) {
    return "Hello " . $customer->name;
  } else {
    return "Hello " . $customer->gender->value . $customer->name;
  }
}

echo sayHello(new Customer("1", "Male", Gender::Male)) . PHP_EOL;
var_dump(sayHello(new Customer("2", "Female", Gender::from("Mrs."))));
var_dump(sayHello(new Customer("3", "Try", Gender::tryFrom("Salah"))));

var_dump(Gender::cases());

var_dump(Gender::Male->sayHello());
var_dump(Gender::Female->sayHello());
var_dump(Gender::Male->inIndonesia());
var_dump(Gender::Female->inIndonesia());

var_dump(Gender::fromIndonesia("Tuan"));
var_dump(Gender::fromIndonesia("Nyonya"));
// var_dump(Gender::fromIndonesia("Salah"));

var_dump(Gender::Unknown);