jQuery(document).ready(function($) {
    $('.dropdown').each(function(index, dropdown){
        //Find the input search box
        let search = $(dropdown).find('.search');

        //Find every item inside the dropdown
        let items = $(dropdown).find('.dropdown-item-title');

        //Capture the event when user types into the search box
        $(search).on('input', function(){
            console.log($(this).val())
            filter($(this).val().trim().toLowerCase())
        });

        //For every word entered by the user, check if the symbol starts with that word
        //If it does show the symbol, else hide it
        function filter(word) {
            let length = items.length
            let collection = []
            let hidden = 0
            for (let i = 0; i < length; i++) {
                console.log(items[i].innerText.toLowerCase())
                if (items[i].innerText.toLowerCase().includes(word)) {
                    $(items[i]).closest('.dropdown-item').show()
                }
                else {
                    $(items[i]).closest('.dropdown-item').hide()
                    hidden++
                }
            }

            //If all items are hidden, show the empty view
            if (hidden === length) {
                $(dropdown).find('.dropdown_empty').show();
            }
            else {            
                $(dropdown).find('.dropdown_empty').hide();
            }
        }
    });
});