const submit = document.getElementById("submit_button");

submit.addEventListener('click', (e) => {
    const entryDate = new Date(document.getElementById("entry").value);

    if (!entryDate.getTime()) {
        alert("You must select both entry and exit dates");
        e.preventDefault();
        return;
    }

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    if (entryDate <= today) {
        alert("Reservations can only be made for the following day");
        e.preventDefault();
        return;
    }
});
