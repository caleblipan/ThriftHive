document.querySelectorAll(".txtb input").forEach(function (item) {
    item.addEventListener("focus", function(){
        this.classList.add("focus");
    });
});

document.querySelectorAll(".txtb input").forEach(function (i) {
    i.addEventListener("blur", function(){
        if (this.value == "")
            this.classList.remove("focus");
    });
});

var eventList = ["keyup", "keypress"];
var IDs = ["itemName", "itemCaptions", "productQuantity", "productPrice", "shippingCost"];

for(event of eventList) {
    document.getElementById('itemName').addEventListener(event, function() {
            var edValue = document.getElementById("itemName");
            var s = edValue.value;

            var lblValue = document.getElementsByClassName("itemName")[0];
            lblValue.innerText = s;
    })
}
for(event of eventList) {
    document.getElementById('itemCaptions').addEventListener(event, function() {
            var edValue = document.getElementById("itemCaptions");
            var s = edValue.value;

            var lblValue = document.getElementsByClassName("itemCaptions")[0];
            lblValue.innerText = s;
    })
}

document.getElementById("photo").addEventListener("change", function() {
        if (document.getElementById("photo").files && document.getElementById("photo").files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.photo')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(document.getElementById("photo").files[0]);
        }
})

for(event of eventList) {
    document.getElementById('productQuantity').addEventListener(event,function() {
            var edValue = document.getElementById("productQuantity");
            var s = edValue.value;

            var lblValue = document.getElementsByClassName("productQuantity")[0];
            lblValue.innerText = s;
    })
}
for(event of eventList) {
    document.getElementById('productPrice').addEventListener(event,function() {
            var edValue = document.getElementById("productPrice");
            var s = edValue.value;

            var lblValue = document.getElementsByClassName("productPrice")[0];
            lblValue.innerText = s;
    })
}
for(event of eventList) {
    document.getElementById('shippingCost').addEventListener(event,function() {
            var edValue = document.getElementById("shippingCost");
            var s = edValue.value;

            var lblValue = document.getElementsByClassName("shippingCost")[0];
            lblValue.innerText = s;
    })
}

