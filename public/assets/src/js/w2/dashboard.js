$(document).ready(function () {
    handleDate();
});

// 03 Feb 2025
function handleDate() {
    const dateInput = $('#date-input');
    const minDate = new Date('2025-02-03');

    function setDate(date) {
        dateInput.val(date.toISOString().split('T')[0]);
        fetchAnimals(); // Fetch animals when the date changes
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

    // Set initial date
    setDate(new Date('2025-02-03'));

    $('#increase-day').click(() => changeDate(1));
    $('#decrease-day').click(() => changeDate(-1));

    // Listen for manual date changes
    dateInput.change(() => fetchAnimals());
}

function fetchAnimals() {
    $.ajax({
        url: `${baseUrl}/animals/date`,
        method: `GET`,
        data: { date: $('#date-input').val() },
        success: (animals) => {
            renderAnimals(animals);
        },
        error: function () {
            alert("Failed to fetch animals");
        },
    });
}

function renderAnimals(animals) {
    $('#section2').html(""); 

    let html = `<div class="animal-list">`;
    
    animals.forEach(animal => {
        html += `
            <div class="card">
                <img src="${animal.pic}" alt="${animal.animal_name}">
                <div class="card-body">
                    <h2>${animal.animal_name}</h2>
                    <p>${animal.description}</p>
                </div>
            </div>
        `;
    });

    html += `</div>`;
    $('#section2').append(html);
}

