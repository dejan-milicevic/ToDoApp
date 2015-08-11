var jsonObject = {
    "company" : "Vivify Ideas",
    "location" : "Novi Sad",
    "employees" : ["Milos Janjic", "Goran Prijic", "Stevan Alimpijevic"],
    "sports" : ["ping-pong", "table-soccer", "pool"],
    "office" : "house",
    "hardware" : "mac"
}

var arrayOfObjects = [
    {
        "company" : "Vivify Ideas",
        "location" : "Novi Sad",
        "employees" : ["Milos Janjic", "Goran Prijic", "Stevan Alimpijevic"],
        "sports" : ["ping-pong", "table-soccer", "pool"],
        "office" : "house",
        "hardware" : "mac"
    },
    {
        "company" : "Metech doo",
        "location" : "Smederevo",
        "employees" : ["Marko Jovanovic", "Walter Knabe", "Edward Rutten"],
        "sports" : ["soccer"],
        "office" : "factory",
        "hardware" : "desktop"
    },
    {
        "company" : "DMS",
        "location" : "Novi Sad",
        "employees" : ["Milos Mihajlovic", "Nemanja Panic", "Marko Ivanovic"],
        "sports" : ["ping-pong", "surfing"],
        "office" : "commercial building",
        "hardware" : "mac"
    }
]

console.log(jsonObject);
console.log(jsonObject.sports[2]);
console.log(arrayOfObjects);
console.log(arrayOfObjects[1]);
console.log(arrayOfObjects[2].office)

var Person = (function() {

    personCounter = -1; // starts from -1, because in line 79th, Person constructor is unintentionally called

    function Person(firstName, lastName, gender) {

        personCounter++;

        this.firstName = firstName;
        this.lastName = lastName;
        this.gender = gender;
    }

    return Person;
})();

Person.prototype.age = null;
Person.prototype.speak = function() {
    console.log("My name is " + this.firstName);
}

var Employee = (function() {

    employeeCounter = 0;

    function Employee(firstName, lastName, gender, proffession) {

        employeeCounter++;

        Person.call(this, firstName, lastName, gender);
        this.proffession = proffession;
    }

    return Employee;
})();

Employee.prototype = new Person();

Employee.prototype.constructor = Employee;

var steva = new Person('Stevan', 'Alimpijevic', 'male');
console.log("Curent number of persons: " + personCounter);
console.log("Curent number of employees: " + employeeCounter);

var deja = new Employee('Dejan', 'Milicevic', 'male', 'Engineer');
console.log("Curent number of persons: " + personCounter);
console.log("Curent number of employees: " + employeeCounter);

console.log(steva.firstName);
console.log(steva.lastName);
console.log(steva.gender);

steva.age = 29;
console.log(steva.age);

console.log(steva.proffession);
steva.speak();

console.log(deja.firstName);
console.log(deja.lastName);
console.log(deja.gender);
console.log(deja.age);
console.log(deja.proffession);
deja.speak();

Employee.prototype.speak = function() {
    console.log("My name is " + this.firstName + " and I am " + this.proffession + ".");
}

steva.speak();
deja.speak();

console.log(steva instanceof Person);
console.log(steva instanceof Employee);
console.log(deja instanceof Person);
console.log(deja instanceof Employee);



