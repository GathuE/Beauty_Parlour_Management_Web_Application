$(function() {
    
    "use strict";
    
    //===== Prealoder
    
    $(window).on('load', function(event) {
        $('.preloader').delay(500).fadeOut(500);
    });
    
});


function manage(amount) {
    var bt = document.getElementById('retainer');
    var btn = document.getElementById('btn');
    if (amount.value != '') {
        bt.hidden = false;
        btn.hidden = false;
    }
    else {
        bt.hidden = true;
        btn.hidden = true;
    }
};

function calculator(){
    var clientcode = document.getElementById("clientcode").value;
    var employeecode = document.getElementById("employeecode").value;
    var service = document.getElementById("service").value;
    var amount = document.getElementById("amount").value;

    //HAIR SERVICE
    if(service == "S001" ){
        var employeeretainer = (amount / 2).toFixed(0);
        var businessretainer = (amount / 2).toFixed(0);
        var productretainer = 0;
    }
    //PRODUCTS SERVICE
    else if (service == "S002" ){
        var employeeretainer = (amount / 3).toFixed(0);
        var businessretainer = (amount / 3).toFixed(0);
        var productretainer = (amount / 3).toFixed(0);
    }
    //NAILS SERVICE
    else if (service == "S003"){
        var employeeretainer = (amount * 0.45).toFixed(0);
        var businessretainer = (amount * 0.55).toFixed(0);
        var productretainer = 0;

    }
    if(amount >= 500){
        var rewardpoints = (amount / 500) * 1;
    } 
    else if(amount < 500){

        var rewardpoints = 0 ;
    }
    //Make the values of the variables Global
    window.employeeretainer = employeeretainer;
    window.businessretainer = businessretainer;
    window.productretainer = productretainer;
    window.rewardpoints = rewardpoints;

    window.clientcode = clientcode;
    window.employeecode = employeecode;
    window.service = service;
    window.amount = amount;

    document.getElementById("employeeretainer").innerHTML = employeeretainer ;
    document.getElementById("businessretainer").innerHTML = businessretainer ;
    document.getElementById("productretainer").innerHTML = productretainer ;
    document.getElementById("productretainer").innerHTML = productretainer ;
    document.getElementById("rewardpoints").innerHTML = rewardpoints ;
   

};