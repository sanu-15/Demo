//name function
function meth(a) {
  console.log(a * 4);
}
meth(4);

//arro function
const method = (a) => {
  console.log(a ** 5);
};
method(2);

//withoutname function
const metho = function () {
  console.log(10 == 10);
};
metho();

//class + method
class Emp {
  id;
  name;
  constructor(id, name) {
    this.id = id;
    this.name = name;
  }
}
const displayinfo = function () {
  console.log("Employe");
};
const e = new Emp(15, "Tom");
console.log(e.id);
console.log(e.name);
displayinfo();

//class with constructor
class A {
  id;
  name;
  constructor(id, name) {
    this.id = id;
    this.name = name;
  }
}
const a = new A(15, "Herry");
console.log(a);

//without object
const person = {
  name: "Sanu",
  age: 19,
  gender: "female",
};
console.log(person);

//array
const arr = [10, 20, 30, 40, 50, 60];
console.log(arr);
console.log(arr[1]);
console.log(arr[arr.length - 6]);
arr.push(10);
console.log(arr);
arr.pop();
console.log(arr);

//map,filter,reduce
const arry = [10, 20, 30, 40, 50, 60];

const double = arry.map((arry) => {
  return arry * 2;
});
console.log(double);

const even = arry.filter((arry) => {
  return arry % 20;
});
console.log(even);

const sum = arry.reduce((total, currentvalue) => {
  return total + currentvalue;
});
console.log(sum);

//try,catch,finally
try {
  const pi = 31.4;
  console.log(pi);
  pi = 5;
  console.log(pi);
} catch (error) {
  console.log(error.name);
  console.log(error.message);
} finally {
  console.log("done");
}
