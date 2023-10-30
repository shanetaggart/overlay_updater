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
            // Set the ID of the new <option> element to the character name with no spaces.
            newOption.id = character.toLowerCase().replaceAll(' ', '');
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

    // Remove the require attribute from the <select> elements before form submission.
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

    // When the <select> element changes, change the image and remove the grayscale filter.
    leftCharacterSelect.addEventListener('change', (event) => {
        leftCharacterImage.src = leftCharacterImagePath + leftCharacterSelect.value.replaceAll(' ', '') + '.png';
        leftCharacterImage.style.filter = 'grayscale(0)';
    });

    rightCharacterSelect.addEventListener('change', (event) => {
        rightCharacterImage.src = rightCharacterImagePath + rightCharacterSelect.value.replaceAll(' ', '') + '.png';
        rightCharacterImage.style.filter = 'grayscale(0)';
    });

    // Store the swap button.
    const swapButton = document.getElementById('swap');
    
    // Store the left and right form elements.
    const leftName = document.getElementById('left_name');
    const rightName = document.getElementById('right_name');
    const leftScore = document.getElementById('left_score');
    const rightScore = document.getElementById('right_score');
    const leftCharacter = document.getElementById('left_character');
    const rightCharacter = document.getElementById('right_character');

    // Store all of the left and right form elements inside an array.
    let leftAndRightElements = [];
    leftAndRightElements.push(    
        leftName,
        rightName,
        leftScore,
        rightScore,
        leftCharacter,
        rightCharacter
    );

    swapButton.addEventListener('click', (event) => {
        // Prevent the default action of submitting a form when a button is clicked.
        event.preventDefault();

        // Convert placeholder data to be the value of the elements.
        leftAndRightElements.forEach((element) => {
            if (element.tagName !== 'SELECT') {
                if (!element.value) {
                    element.value = element.placeholder;
                }
            } else {
                if (!element.value) {
                    let optionID = document.getElementById(element.firstElementChild.innerText);
                    element.value = optionID.value;
                    const event = new Event('change');
                    element.dispatchEvent(event);
                }
            }
        });

        // Swap the data for Names.
        let tempName = leftName.value;
        leftName.value = rightName.value;
        rightName.value = tempName;

        // Swap the data for Scores.
        let tempScore = leftScore.value;
        leftScore.value = rightScore.value;
        rightScore.value = tempScore;

        // Swap the data for Characters.
        if (leftCharacter.value || rightCharacter.value) {
            let tempCharacter = leftCharacter.value;
            leftCharacter.value = rightCharacter.value;
            rightCharacter.value = tempCharacter;
        } else if (!leftCharacter.value && !rightCharacter.value) {
            let tempCharacter = leftCharacter.firstElementChild.innerText;
            leftCharacter.firstElementChild.innerText = rightCharacter.firstElementChild.innerText;
            rightCharacter.firstElementChild.innerText = tempCharacter;
        }

        // Swap the data for Character Images.
        if (leftCharacter.value) {
            leftCharacterImage.src = '../assets/characters/left/' + leftCharacter.value.replaceAll(' ', '') + '.png';
        } else {
            leftCharacterImage.src = '../assets/characters/left/' + leftCharacter.firstElementChild.innerText.replaceAll(' ', '') + '.png';
        }

        if (rightCharacter.value) {
            rightCharacterImage.src = '../assets/characters/right/' + rightCharacter.value.replaceAll(' ', '') + '.png';
        } else {
            rightCharacterImage.src = '../assets/characters/right/' + rightCharacter.firstElementChild.innerText.replaceAll(' ', '') + '.png';
        }
    });
});