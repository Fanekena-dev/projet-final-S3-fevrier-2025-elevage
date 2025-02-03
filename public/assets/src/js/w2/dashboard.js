$(document).ready(function () {
    // Date Handling
    const dateInput = $('#date-input');
    const minDate = new Date('2025-02-03');

    function setDate(date) {
        dateInput.val(date.toISOString().split('T')[0]);
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
});
