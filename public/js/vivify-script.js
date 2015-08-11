secondVariable = 'This is second variable';
firstVariable = 'This is first variable';


firstFunction(inlineVariable); // function call can be placed before function declaration

firstFunction(firstVariable);

firstFunction(globalInnerVariable);

// anonymous function
var secondFunction = function() {
    var localInnerVariable = 'This is local inner variable';
    globalInnerVariable = 'This is global inner variable';

    console.log(secondVariable + ' & ' + localInnerVariable + ' & ' + globalInnerVariable);
}


// just function
function firstFunction(a) {
    globalInnerVariable = 'Global inner variable';
    console.log(a);
}

// anonymous function
var anonymousFunction = function(a) {
    console.log(a);
};

secondFunction(); // function call must be placed after function expression

firstFunction(globalInnerVariable);



