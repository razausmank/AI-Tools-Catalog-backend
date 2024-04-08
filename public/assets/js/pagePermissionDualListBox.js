// specific dual list box
// Class definition
var dualListBoxClass2 = function() {
    // Private functions
    var Funct = function () {
// Dual Listbox1
var $this = $('#' + $('.dual-listbox2').attr('id'));

var leftTitle =  $('.dual_listbox_unique2').data('lefttitle');
var rightTitle =  $('.dual_listbox_unique2').data('righttitle');
// get options
var options = [];

// init dual listbox
var dualListBox = new DualListbox($this.get(0), {
addEvent: function (value) {
console.log(value);
},
removeEvent: function (value) {
console.log(value);
},
availableTitle: leftTitle,
selectedTitle: rightTitle,
addButtonText: 'Add',
removeButtonText: 'Remove',
addAllButtonText: 'Add All',
removeAllButtonText: 'Remove All',
options: options,
});
};

    return {
        // public functions
        init: function() {
            Funct();
        },
    };
}();

$(function() {
    dualListBoxClass2.init();

});
