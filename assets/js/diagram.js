var dataSuara = {
    labels: ['1. Aldo - Baris', '2. Dubi - Fury'],
    datasets: [{
        label: 'Jumlah Suara',
        data: [53, 27, 100],
        backgroundColor: [
            'rgba(54, 162, 235, 0.5)',
            'rgba(54, 162, 235, 0.5)'
        ],
        borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)'
        ],
        borderWidth: 1
    }]
};

var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
};

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: dataSuara,
    options: chartOptions
});



function performLogin() {
    var ID = document.getElementById("ID").value;
    var password = document.getElementById("password").value;

    var users = [{
            ID: "admin",
            password: "admin",
            role: "admin"
        },
        {
            ID: "1234567001",
            password: "1234567001",
            role: "siswa"
        },
        {
            ID: "1234567002",
            password: "1234567002",
            role: "siswa"
        },
        {
            ID: "1234567003",
            password: "1234567003",
            role: "siswa"
        },
        {
            ID: "1234567004",
            password: "1234567004",
            role: "siswa"
        },
        {
            ID: "1234567005",
            password: "1234567005",
            role: "siswa"
        },
        {
            ID: "1234567006",
            password: "1234567006",
            role: "siswa"
        },
        {
            ID: "1234567007",
            password: "1234567007",
            role: "siswa"
        },
        {
            ID: "1234567008",
            password: "1234567008",
            role: "siswa"
        },
        {
            ID: "1234567009",
            password: "1234567009",
            role: "siswa"
        },
        {
            ID: "1234567010",
            password: "1234567010",
            role: "siswa"
        },
    ];

    var loggedInUser = users.find(function (user) {
        return user.ID === ID && user.password === password;
    });

    if (loggedInUser) {
        if (loggedInUser.role === "admin") {
            goToPage("../html/admin.html");
        } else {
            goToPage("../html/siswa.html");
        }
    } else {
        alert("Username atau password salah!");
    }
}

function goToPage(url) {
    window.location.href = url;
}


function showThankYouMessage() {
    alert("Terima kasih telah memilih!");
    goToPage("../html/siswa.html")
}

document.getElementById("voteButton").addEventListener("click", showThankYouMessage);