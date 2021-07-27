/* DOCU:
    Using JSON to fetch objects in an array
        - id,name,type

    OWNER: Kei Kishimoto
*/
$(document).ready(function () {
	let all_pets = [
        { id: 1, name: "Garfield", type: "Cat"},
		{ id: 2, name: "Doraemon", type: "Cat"},
		{id: 3, name: "Snoopy", type: "Dog"},
		{id: 4,name: "Daffy", type: "Duck"},
		{id: 5, name: "Pen Pen", type: "Penguin"},
	];
/* DOCU:
    Using function to insert details using for loop

    OWNER: Kei Kishimoto
*/
	function pets() {
		let pets = ``;
		for (let i = 0; i < all_pets.length; i++) {
			pets += `<menu class="all_pets" data-pet="${all_pets[i].name}">`;
			pets += `	<p>${all_pets[i].name}</p>`;
			pets += `	<p>${all_pets[i].type}</p>`;
			pets += `	<div class="action">`;
			pets += `		<a href="#" role="button" class="detailsPet-open-modal" data-toggle="modal" data-target=".detailsPet"><i class="fas fa-clipboard-list"></i> Details</a>`;
			pets += `		<a href="#" role="button" data-toggle="modal" class="editPet-open-modal" data-target=".editPet"><i class="fas fa-edit"></i> Edit</a>`;
			pets += `	</div>`;
			pets += `</menu>`;
		}
		$(".pet-lists").html(pets);
	}
/* DOCU:
    Adding pet on the list with validations
        
    OWNER: Kei Kishimoto
*/
	$(".btn-add")
    .click(function () {
		if ($("#pet-name").val() == "") {
			alert("Pet name cannot be blank!");
			return false;
		}
		let new_pet = {
			id: all_pets.length + 1,
			name: $("#pet-name").val(),
			type: $("#pet-type").val(),
		};
		all_pets.unshift(new_pet);
		pets();
		$(".added-pet-name").html($("#pet-name").val());
		$("#pet-name").val("");
		$("#pet-type").val($("#pet-type option:first").val());
	});
/* DOCU:
    Vieweing pet details
        
    OWNER: Kei Kishimoto
*/
	$(document)
    .on("click", ".detailsPet-open-modal", function (e) {
		e.preventDefault();
		$(".detailsPet .modal-dialog .modal-content .modal-header .modal-title .pet-name").html($(this).parent().siblings()[0].innerHTML);
		$(".detailsPet .modal-dialog .modal-content .modal-body .pet-type").html($(this).parent().siblings()[1].innerHTML);
		$(".detailsPet .modal-dialog .modal-content .modal-footer .pet-name").html($(this).parent().siblings()[0].innerHTML);
	});
	$(document)
    .on("click", ".editPet-open-modal", function (e) {
		e.preventDefault();
		$(".editPet .modal-dialog .modal-content .modal-header .modal-title .pet-name").html($(this).parent().siblings()[0].innerHTML);
		$(`.editPet .modal-dialog .modal-content .modal-body .pet-type option:contains("${$(this).parent().siblings()[1].innerHTML}")`).prop(
			"selected",
			true
		);
	});
/* DOCU:
        Editing pet details using for loop
        
        OWNER: Kei Kishimoto
*/
	$(document).on("click", ".btn-update", function () {
		let pet_to_edit = $(".editPet .modal-dialog .modal-content .modal-header .modal-title .pet-name").html();
		for (let i = 0; i < all_pets.length; i++) {
			if (pet_to_edit == all_pets[i].name) {
				all_pets[i].type = $(`#pet-type-edit`).val();
			}
		}
		pets();
	});
	pets();
});