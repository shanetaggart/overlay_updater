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

    const formInputs = document.querySelectorAll('input, select');

    if (formInputs) {

        const scrollOptions = {
            behavior: "smooth",
            block: "center",
            inline: "center"
        };

        formInputs.forEach((input) => {
            input.addEventListener('focus', (event) => {
                input.scrollIntoView(scrollOptions);
            });
        });
    }
});