class Profile {

	constructor() {
		this.formState = 1;
	}

	openForm() {

		const input = document.querySelectorAll('input, select, textarea')
		for (var i = 0; i < input.length; i++) {
			var el = input[i]
			el.removeAttribute('readonly')
			el.removeAttribute('disabled')
		}
		
	}
}