$(document).ready(function () {
    handleDate();
});

// 03 Feb 2025
function handleDate() {
    const dateInput = $('#date-input');
    const minDate = new Date('2025-02-03');

    function setDate(date) {
        dateInput.val(date.toISOString().split('T')[0]);
        animals = fetchAnimals();
    }

    function changeDate(days) {
        let currentDate = new Date(dateInput.val());
        currentDate.setDate(currentDate.getDate() + days);

        // Prevent date from going before 2025-02-03
        if (currentDate < minDate) {
            currentDate = minDate;
        }

        setDate(currentDate);
    }

    setDate(new Date('2025-02-03'));
    $('#increase-day').click(() => changeDate(1));
    $('#decrease-day').click(() => changeDate(-1));
}

function fetchAnimals() {
    $.ajax({
        url: `${baseUrl}/animals`,
        method: `GET`,
        success: (animals) => {
            renderAnimals(animals);
        },
        error: function () {
            alert("Failed to fetch animals");
        },
    });
}

function renderAnimals(animals) {
    animals.forEach(animal => {
        html = `
            <div class="card">
                <img src="${animal.pic}" alt="${animal.pic}">
                <h2>${animal.name}</h2>
                <p>${animal.description}</p>
            </div>
            `;
        $('#section2').append(html);
    });
}