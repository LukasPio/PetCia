const submit = document.querySelector("input[type='submit']");

submit.addEventListener('click', (e) => {
    const entryDate = new Date(document.getElementById("entry").value);
    const exitDate = new Date(document.getElementById("exit").value);

    if (!entryDate.getTime() || !exitDate.getTime()) {
        alert("You must select both entry and exit dates");
        e.preventDefault();
        return;
    }

    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    if (entryDate <= today) {
        alert("The entry date must be at least the following day");
        e.preventDefault();
        return;
    }

    if (exitDate <= entryDate) {
        alert("The exit date must be after the entry date");
        e.preventDefault();
        return;
    }

    const minExitDate = new Date(entryDate);
    minExitDate.setDate(entryDate.getDate() + 1);
    
    if (exitDate < minExitDate) {
        alert("The exit date must be at least 1 day after the entry date");
        e.preventDefault();
        return;
    }
});
