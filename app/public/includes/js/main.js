window.addEventListener('load', (event) => {

    // Determine if this is the singles or doubles page.
    const page = window.location.href.toString().split("/").pop();

    let singles = false;
    let doubles = false;

    page == 'index.php' ? singles = true: doubles = true;

    // Set event constants.
    const changeEvent = new Event('change');

    // Query and store the <form> element.
    const mainForm = document.getElementById('form');

    // Query and store the two <select> elements that need <option> elements appended for character names.
    let characterSelectLists = document.querySelectorAll('.characters');

    // Iterate through the <select> elements.
    characterSelectLists.forEach((select) => {
        // Iterate through the characters.
        characters.forEach((character) => {
            // Create a new <option> element, and set the apporpriate attributes.
            let newOption = document.createElement('option');
            newOption.innerText = character;
            newOption.value = character.toLowerCase();
            newOption.id = character.toLowerCase().replaceAll(' ', '');
            select.append(newOption);
        });
    });

    // Query and store all <input> and <select> elements.
    const formInputs = document.querySelectorAll('input, select');

    // If there are <input> and <select> elements, set smooth scrolling behaviour on focus.
    if (formInputs) {
        const scrollOptions = {
            behavior: "smooth",
            block: "center",
            inline: "center"
        };

        formInputs.forEach((input) => {
            if (input.type != 'checkbox') {
                input.addEventListener('focus', (event) => {
                    input.scrollIntoView(scrollOptions);
                });
            }
        });
    }

    // Query and store the reset button.
    const resetButton  = document.getElementById('form-reset');
    
    // When the reset button is clicked, run the reset_data script.
    if (singles) {
        resetButton.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = "includes/reset_data.php";
        });
    }

    // Query and store the submit button.
    const submitButton  = document.getElementById('form-submit');

    /**
     * When the submit button is clicked, remove the required attributes.
     * This prevents form validation from firing before form submission, but
     * the required attributes are required for appropriate placeholder CSS.
     */
    submitButton.addEventListener('click', (event) => {
    selectElements = document.querySelectorAll('select');
        selectElements.forEach((select) => {
            select.required = false;
        });
    });

    // Query and store the two character <select> and <img> elements.
    let leftCharacterSelect = document.getElementById('left_character');
    let leftCharacterImage = document.getElementById('left_character_image');

    let rightCharacterSelect = document.getElementById('right_character');
    let rightCharacterImage = document.getElementById('right_character_image');
    
    // Store the paths for the left and right-facing character images.
    const leftCharacterImagePath = 'http://localhost/overlay_updater/app/public/assets/characters/left/';
    const rightCharacterImagePath = 'http://localhost/overlay_updater/app/public/assets/characters/right/';

    // When the <select> elements change, change the image source and remove the grayscale filter.
    if (singles) {
        leftCharacterSelect.addEventListener('change', (event) => {
            leftCharacterImage.src = leftCharacterImagePath + leftCharacterSelect.value.replaceAll(' ', '') + '.png';
            leftCharacterImage.style.filter = 'grayscale(0)';
        });
    
        rightCharacterSelect.addEventListener('change', (event) => {
            rightCharacterImage.src = rightCharacterImagePath + rightCharacterSelect.value.replaceAll(' ', '') + '.png';
            rightCharacterImage.style.filter = 'grayscale(0)';
        });
    }

    // Query and store the swap button.
    const swapButton = document.getElementById('swap');
    
    // Query and store the left and right form elements.
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

    // When the swap button is clicked, convert placeholder data to actual data, and swap the left and right.
    if (singles) {
        swapButton.addEventListener('click', (event) => {
            event.preventDefault();
    
            leftAndRightElements.forEach((element) => {
                if (element.tagName !== 'SELECT') {
                    if (!element.value) {
                        element.value = element.placeholder;
                    }
                } else {
                    if (!element.value) {
                        let optionID = document.getElementById(element.firstElementChild.innerText);
                        element.value = optionID.value;
                        element.dispatchEvent(changeEvent);
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
                leftCharacterImage.src = 'http://localhost/overlay_updater/app/public/assets/characters/left/' + leftCharacter.value.replaceAll(' ', '') + '.png';
            } else {
                leftCharacterImage.src = 'http://localhost/overlay_updater/app/public/assets/characters/left/' + leftCharacter.firstElementChild.innerText.replaceAll(' ', '') + '.png';
            }
    
            if (rightCharacter.value) {
                rightCharacterImage.src = 'http://localhost/overlay_updater/app/public/assets/characters/right/' + rightCharacter.value.replaceAll(' ', '') + '.png';
            } else {
                rightCharacterImage.src = 'http://localhost/overlay_updater/app/public/assets/characters/right/' + rightCharacter.firstElementChild.innerText.replaceAll(' ', '') + '.png';
            }
        });
    }

    // Query and store the score buttons.
    const plusAndMinusButtons = document.querySelectorAll('.score-wrapper .score-buttons');

    // Determine if it was a plus/minus and left/right button and perform the appropriate calculation.
    plusAndMinusButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            
            if (button.classList.contains('left')) {

                leftScore.value ? null: leftScore.value = parseInt(leftScore.placeholder);

                if (button.classList.contains('minus')) {
                    leftScore.stepDown();
                } else if (button.classList.contains('plus')) {
                    leftScore.stepUp();
                }
            } else if (button.classList.contains('right')) {

                rightScore.value ? null: rightScore.value = parseInt(rightScore.placeholder);

                if (button.classList.contains('minus')) {
                    rightScore.stepDown();
                } else if (button.classList.contains('plus')) {
                    rightScore.stepUp();
                }
            }

            // Immediately submit the form.
            mainForm.submit();
        });
    });
});