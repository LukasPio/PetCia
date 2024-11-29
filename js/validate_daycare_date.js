    const submit = document.getElementById("submit_button");

    submit.addEventListener('click', (e) => {
        const entryDate = new Date(document.getElementById("entry_date").value);
        const exitDate = new Date(document.getElementById("exit_date").value);

        if (!entryDate.getTime() || !exitDate.getTime()) {
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

        if (exitDate <= entryDate) {
            alert("Insert a valid exit date");
            e.preventDefault();
            return;
        }

        const minExitDate = new Date(entryDate);
        minExitDate.setDate(entryDate.getDate() + 3);
        
        if (exitDate < minExitDate) {
            alert("The exit date must be at least 3 days after entry");
            e.preventDefault();
            return;
        }
    });
