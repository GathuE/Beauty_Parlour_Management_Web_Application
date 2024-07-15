function retainer(){
    var clientcode = document.getElementById("clientcode").value;
    var employeecode = document.getElementById("employeecode").value;
    var service = document.getElementById("service").value;
    var amount = document.getElementById("amount").value;

    //HAIR SERVICE
    if(service == "S001" ){
        var employeeretainer = (amount / 2);
        var businessretainer = (amount / 2);
        var productretainer = 0;
    }
    //PRODUCTS SERVICE
    else if (service == "S002" ){
        var employeeretainer = (amount / 3);
        var businessretainer = (amount / 3);
        var productretainer = (amount / 3);
    }
    //NAILS SERVICE
    else if (service == "S003"){
        var employeeretainer = (amount * 0.45);
        var businessretainer = (amount * 0.55);
        var productretainer = 0;

    }
    //Make the values of the variables Global
    window.employeeretainer = employeeretainer;
    window.businessretainer = businessretainer;
    window.productretainer = productretainer;

    window.clientcode = clientcode;
    window.employeecode = employeecode;
    window.service = service;
    window.amount = amount;

    document.getElementById("employeeretainer").innerHTML = employeeretainer ;

};