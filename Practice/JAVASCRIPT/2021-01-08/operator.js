var year = 2021;
var ageSmit = 21;
var ageJemish = 22;

var birthSmit = year - ageSmit;
console.log(birthSmit);

var birthJemish = year - ageJemish;
console.log(birthJemish);

var cmYear = birthJemish == birthSmit;
console.log(cmYear);
console.log(typeof(cmYear));

console.log(year + 2);
console.log(year - 2);
console.log(year * 2);
console.log(year / 2);
console.log(year % 2);

var presentYear = 2020;
var fullAge = 18;

var isFullAge = presentYear - ageJemish >= fullAge;
console.log(isFullAge);

var average = (ageSmit + ageJemish)/2;
console.log(average);
