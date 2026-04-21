function add() {
    var a = document.getElementById("t1").value;
    var b = document.getElementById("t2").value;

    // Convert to numbers
    var sum = Number(a) + Number(b);

    document.getElementById("ans").innerHTML = "Result: " + sum;
}
