window.addEventListener('load', (event) => {

    // Query and store the two <select> elements that need <option> elements added.
    let characterSelectLists = document.querySelectorAll('.characters');

    // Iterate through the <select> elements.
    characterSelectLists.forEach((select) => {
        // Iterate through the characters.
        characters.forEach((character) => {
            // Create a new <option> element.
            let newOption = document.createElement('option');
            // Set the innerText of the new <option> element to the character name.
            newOption.innerText = character;
            // Set the value of the new <option> element to the character name.
            newOption.value = character.toLowerCase();
            // Append the new <option> element as a child of the <select> element.
            select.append(newOption);
        });
    });

    // Query and store all <input> and <select> elements.
    const formInputs = document.querySelectorAll('input, select');

    // Only continue if there are <input> and <select> elements.
    if (formInputs) {
        // Set the general options for scrolling to be smooth and to center the element.
        const scrollOptions = {
            behavior: "smooth",
            block: "center",
            inline: "center"
        };

        // Iterate through every <input> and <select> element.
        formInputs.forEach((input) => {
            // Add a focus event listener for every input and select element.
            input.addEventListener('focus', (event) => {
                // When an <input> and <select> element is focused, scroll it into view using the options.
                input.scrollIntoView(scrollOptions);
            });
        });
    }

    // Query and store the rest button.
    const resetButton  = document.getElementById('form-reset');
    
    // Add a click event listener.
    resetButton.addEventListener('click', (event) => {
        // Prevent the default action of the button, inside of a form, this would normally submit.
        event.preventDefault();
        // Redirect to reset_data.php.
        window.location.href = "includes/reset_data.php";
    });

    // Query and store the submit button.
    const submitButton  = document.getElementById('form-submit');

    submitButton.addEventListener('click', (event) => {
    selectElements = document.querySelectorAll('select');
        selectElements.forEach((select) => {
            select.required = false;
        });
    });

    // Query and store the two character images.
    let leftCharacterSelect = document.getElementById('left_character');
    let leftCharacterImage = document.getElementById('left_character_image');

    let rightCharacterSelect = document.getElementById('right_character');
    let rightCharacterImage = document.getElementById('right_character_image');
    
    const leftCharacterImagePath = '../assets/characters/left/';
    const rightCharacterImagePath = '../assets/characters/right/';

    leftCharacterSelect.addEventListener('change', (event) => {
        leftCharacterImage.src = leftCharacterImagePath + leftCharacterSelect.value.replaceAll(' ', '') + '.png';
        leftCharacterImage.style.filter = 'grayscale(0)';
    });

    rightCharacterSelect.addEventListener('change', (event) => {
        rightCharacterImage.src = rightCharacterImagePath + rightCharacterSelect.value.replaceAll(' ', '') + '.png';
        rightCharacterImage.style.filter = 'grayscale(0)';
    });

});