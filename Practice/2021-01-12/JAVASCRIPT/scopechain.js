var a = "hello1";
first();

function first(){
    var b = "hi1"; // first has access of variable a as it is global variable
    second();
    
    function second(){
        var c = "hey!";  // b is accessed in this function because of parent and a is global
        console.log(a+b+c);
        third(c); //here we don't pass the c as a argument then third function can't access the var c due to scopechain.
        
    }
}
function third(c){
    var d = 'john';
    console.log(c); 
    console.log(a + d);
}