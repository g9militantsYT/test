// JavaScript for authentication (auth.js)
function onSignIn(googleUser) {
    const profile = googleUser.getBasicProfile();
    const idToken = googleUser.getAuthResponse().id_token;
    
    // Send the idToken to your backend for verification and user creation/login
    
    // Example: Sending the idToken to your server using fetch
    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ idToken })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // User successfully logged in or created
            // Redirect to dashboard or homepage
        } else {
            // Handle error
        }
    });
}


//kerbal.html grid
// Function to create a grid item
function createGridItem(item) {
    const { name, description, link, image } = item;
    const gridItem = document.createElement("div");
    gridItem.classList.add("item");
    gridItem.innerHTML = `
        <h2>${name}</h2>
        <p>${description}</p>
        <a href="${link}" target="_blank"><button>View Details</button></a>
        <img src="${image}" alt="${name}" width="150">
    `;
    return gridItem;
}

// Function to fetch and display data from the JSON file
async function loadCatalog() {
    try {
        const response = await fetch("catalog.json");
        const data = await response.json();

        const catalog = document.getElementById("catalog");

        data.forEach((item) => {
            catalog.appendChild(createGridItem(item));
        });
    } catch (error) {
        console.error("Error loading data:", error);
    }
}

// Load the catalog when the page is ready
document.addEventListener("DOMContentLoaded", loadCatalog);