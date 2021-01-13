// TAKE JOHN AS AN OBJECT.

var john = {
    name : 'john',
    height : 1.82,
    weight : 50,
    calcBMI : function(){
        this.BMI = (this.height / (this.weight * this.weight));
        return this.BMI;
    }
};

// TAKE MARK AS AN OBJECT.

var mark = {
    name : 'mark',
    height : 1.82,
    weight : 50,
    calcBMI : function(){
        this.BMI = (this.height / (this.weight * this.weight));
        return this.BMI;
    }
};

john.calcBMI();
console.log(john);
mark.calcBMI();
console.log(mark);

checkBMI(john,mark);

function checkBMI(a,b) {
    if(a.BMI > b.BMI)
      console.log("JOHN HAS MORE BMI THAN MARK" + "THE JOHN\'S BMI IS" + a.BMI);
    else if(a.BMI < b.BMI)
      console.log("MARK HAS MORE BMI THAN MARK" + "THE MARK\'S BMI IS" + b.BMI);
      else{
        console.log("BOTH HAS SAME BMI" + " AND THE BMI IS" + b.BMI);
      }
    
}

