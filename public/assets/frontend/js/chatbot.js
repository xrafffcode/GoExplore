// Referensi elemen dari HTML
const typingForm = document.querySelector(".type-msg form");
const chatContainer = document.querySelector(".inbox ul");
const suggestions = document.querySelectorAll(".suggestion");
const toggleThemeButton = document.querySelector("#theme-toggle-button"); // Pastikan tombol ini ada di HTML Anda
const deleteChatButton = document.querySelector("#delete-chat-button"); // Pastikan tombol ini ada di HTML Anda
const sendChatButton = document.querySelector("#send-chat-button");

// State variables
let userMessage = null;
let isResponseGenerating = false;

// API configuration
const API_KEY = "AIzaSyA4AJy01JzuOBao6OQ5X_CQNt3yNP6ruuw"; // Ganti dengan API key Anda
const API_URL = `https://generativelanguage.googleapis.com/v1/models/gemini-1.5-pro:generateContent?key=${API_KEY}`;

// Load theme and chat data from local storage on page load
const loadDataFromLocalstorage = () => {
    const savedChats = localStorage.getItem("saved-chats");
    chatContainer.innerHTML = savedChats || '';
    chatContainer.scrollTo(0, chatContainer.scrollHeight); // Scroll ke bawah
};

// Membuat elemen pesan baru
const createMessageElement = (content, side) => {
    const li = document.createElement("li");
    li.classList.add(side, "d-flex", side === "left" ? "gap-12" : "flex-row-reverse", "gap-12");

    const div = document.createElement("div");
    div.classList.add("text");

    const p = document.createElement("p");
    p.classList.add("msg");
    p.innerHTML = content;

    div.appendChild(p);
    li.appendChild(div);
    return li;
};

// Menampilkan efek mengetik
const showTypingEffect = (text, li) => {
    const msgElement = li.querySelector(".msg");
    const words = text.split(' ');
    let currentWordIndex = 0;

    const typingInterval = setInterval(() => {
        msgElement.innerText += (currentWordIndex === 0 ? '' : ' ') + words[currentWordIndex++];

        if (currentWordIndex === words.length) {
            clearInterval(typingInterval);
            isResponseGenerating = false;
            localStorage.setItem("saved-chats", chatContainer.innerHTML); // Simpan chat
        }
        chatContainer.scrollTo(0, chatContainer.scrollHeight);
    }, 75);
};

// Mengambil respons dari API
const generateAPIResponse = async (li) => {
    const msgElement = li.querySelector(".msg");
    try {
        const response = await fetch(API_URL, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                contents: [{
                    role: "user",
                    parts: [{ text: userMessage }]
                }]
            }),
        });

        const data = await response.json();
        if (!response.ok) throw new Error(data.error.message);

        const apiResponse = data.candidates[0].content.parts[0].text.replace(/\*\*(.*?)\*\*/g, "$1");
        showTypingEffect(apiResponse, li);
    } catch (error) {
        isResponseGenerating = false;
        msgElement.innerText = error.message;
    } finally {
        li.classList.remove("loading");
    }
};

// Menampilkan animasi loading
// Menampilkan animasi loading di dalam p.msg
const showLoadingAnimation = () => {
    const li = createMessageElement("", "left");
    const msgElement = li.querySelector(".msg");

    li.classList.add("loading");

    // Tambahkan animasi loading ke dalam p.msg
    msgElement.innerHTML = `
        <span class='loading-indicator'>
            <span class='loading-bar'></span>
            <span class='loading-bar'></span>
            <span class='loading-bar'></span>
        </span>
    `;

    chatContainer.appendChild(li);
    chatContainer.scrollTo(0, chatContainer.scrollHeight);
    generateAPIResponse(li);
};


// Mengirim pesan keluar
const handleOutgoingChat = () => {
    userMessage = typingForm.querySelector(".input-msg").value.trim();
    if (!userMessage || isResponseGenerating) return;

    isResponseGenerating = true;

    const outgoingMessage = createMessageElement(userMessage, "right");
    chatContainer.appendChild(outgoingMessage);

    typingForm.reset(); // Kosongkan input
    setTimeout(showLoadingAnimation, 500); // Tampilkan animasi loading
};

// Event listeners
typingForm.addEventListener("submit", (e) => {
    e.preventDefault();
    handleOutgoingChat();
});

sendChatButton.addEventListener("click", handleOutgoingChat);

// Load data awal
loadDataFromLocalstorage();
