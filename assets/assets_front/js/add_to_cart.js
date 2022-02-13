
var fruits = [];
console.log(fruits);


function addThisProduct(object){
    var price = object.getAttribute('data-plan-price');
    var plan_id = object.getAttribute('data-plan-id');  //attr  of each button of add to cart not of cart submit modal

    fruits = [];
    fruits.push(parseFloat(price));
    var m = fruits.reduce((a, b) => a + b, 0)


    document.getElementById('cart_price').innerText = price;
    document.getElementById('cart_submit').setAttribute('data-plan-id' , plan_id);  //attr of the modal


}
/*******************************************************************/
/*
   # is check func is for adding new adons values to the plan price in the modal
*/

function is_check(object) {

    if(object.value == '') {
        object.value = '';

        object.value = object.closest('.check').getAttribute('data-value');

        object.value = parseFloat(object.value);
        fruits.push(parseFloat(object.value));
        var m = fruits.reduce((a, b) => a + b, 0)
    }

}//end of func

////////////////////////////////////////



// function refresh_func() {
//
//      document.getElementById('cart_price').innerText = "+ 0 ";
//
//     // location.reload();
//     // return false;
//
// }



///////////////////////////////////////

///////////////////////////////////////

/******************************************************/
/*
# sure func is used for confirmation of deletion of cart
 */

function sure() {

    var r = confirm("Are You Sure You Want To Delete Your Cart?");
    if (r == true){
        let form = document.getElementById("form__submit");
        form.submit();

    }
}

