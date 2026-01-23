// Just to demonstrate basic js functionality with html
function addNumbers() {
    let n1 = document.getElementById("num1").value;
    let n2 = document.getElementById("num2").value;

    let number1 = parseFloat(n1);
    let number2 = parseFloat(n2);

    if (isNaN(number1) || isNaN(number2)) {
        document.getElementById("result").innerText = "Please enter valid numbers.";
        return;
    }

    let sum = number1 + number2;
    document.getElementById("result").innerText = `Sum: ${sum}`;
}