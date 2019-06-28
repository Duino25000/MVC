require('../sass/main.scss');

class Person{
	constructor(name){
		this.name = name;

	}

	walk(){
		console.log(this.name + ' is waloking');
	}
}

let bob = new Person('Bob');
