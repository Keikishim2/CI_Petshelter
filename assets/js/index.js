/* DOCU:
    Using JSON to fetch objects an array
    @Author: Kei Kishimoto
*/
$(document).ready(function () {
	let all_pets = [
        {id: 1, name: "Garfield", type: "Cat"},
		{id: 2, name: "Doraemon", type: "Cat"},
		{id: 3, name: "Snoopy", type: "Dog"},
		{id: 4,name: "Daffy", type: "Duck"},
		{id: 5, name: "Pen Pen", type: "Penguin"},
	];

	function pets() {
		let pets = ``;
		for (let i = 0; i < all_pets.length; i++) {
			pets += `<menu class="all_pets" data-pet="${all_pets[i].id}">`;
			pets += `	<p>${all_pets[i].name}</p>`;
			pets += `	<p id="type">${all_pets[i].type}</p>`;
			pets += `	<div class="action">`;
			pets += `		<a href="#" role="button" class="detailsPet-open-modal" data-toggle="modal" data-target=".detailsPet"><i class="fas fa-clipboard-list"></i> Details</a>`;
			pets += `		<a href="#" role="button" data-toggle="modal" class="editPet-open-modal" data-target=".editPet"><i class="fas fa-edit"></i> Edit</a>`;
			pets += `	</div>`;
			pets += `</menu>`;
		}
		$(".pet-lists").html(pets);
	}
	$("body")
		.on("click", ".btn-add", addPet)
		.on("click", ".detailsPet-open-modal", showPetDetails)
		.on("click", ".editPet-open-modal", editPet)
		.on("click", ".btn-update", updatePet);
		
/* DOCU:
    Add New Pet
	TRIGGERED BY: .btn-add
    @Author: Kei Kishimoto
*/
	function addPet(){
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
	}
/* DOCU:
    Show Pet Details
	TRIGGERED BY: .detailsPet-open-modal
    @Author: Kei Kishimoto
*/
	function showPetDetails(e) {
		e.preventDefault();
		$(".detailsPet .modal-dialog .modal-content .modal-header .modal-title .pet-name").html($(this).parent().siblings()[0].innerHTML);
		$(".detailsPet .modal-dialog .modal-content .modal-body .pet-type").html($(this).parent().siblings()[1].innerHTML);
		$(".detailsPet .modal-dialog .modal-content .modal-footer .pet-name").html($(this).parent().siblings()[0].innerHTML);
	}
/* DOCU:
    Edit Pet Details
	TRIGGERED BY: .editPet-open-modal
    @Author: Kei Kishimoto
*/
	function editPet(e){
		e.preventDefault();
			$(".editPet .modal-dialog .modal-content .modal-header .modal-title .pet-name").html($(this).parent().siblings()[0].innerHTML);
			$(`.editPet .modal-dialog .modal-content .modal-body .pet-type option:contains("${$(this).parent().siblings()[1].innerHTML}")`).prop(
				"selected",
				true
		);
	}
	function updatePet() {
		let pet_to_edit = $(".editPet .modal-dialog .modal-content .modal-header .modal-title .pet-name").html();
		for (let i = 0; i < all_pets.length; i++) {
			if (pet_to_edit == all_pets[i].name) {
				all_pets[i].type = $(`#pet-type-edit`).val();
			}
		}
		pets();
	};
	pets();
});
