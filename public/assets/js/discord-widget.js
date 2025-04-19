window.addEventListener("DOMContentLoaded", (event) => {

    // COMPTEUR DISCORD
    const discord_key = "702929641110765668";
    const discordCountElement = document.querySelector('.hydaria--js-Discordcount');

    if (discordCountElement && discord_key.length) {
        // Si erreur
        window.onerror = function (msg, url, ln) {
            return msg === "Impossible de trouver la classe du compteur discord.";
        };

        // Affiche du compte
        fetch(`https://discord.com/api/guilds/${discord_key}/embed.json`)
            .then(response => response.json())
            .then(data => {
                discordCountElement.innerHTML = `${data.presence_count} en ligne`;
            });
    }

    // WIDGET DISCORD
    const discordCountWidgetElement = document.querySelector('.hydaria-js--Discordcount');
    const discordWidgetContainer = document.querySelector('.hydaria-widget[data-widget="hydaria_discord_widget"] .hydaria-content .hydaria-Discordusers');

    if (discordCountWidgetElement && discord_key.length) {
        window.onerror = function (msg, url, ln) {
            return msg === "Impossible de trouver la classe.";
        };

        fetch(`https://discord.com/api/guilds/${discord_key}/embed.json`)
            .then(response => response.json())
            .then(data => {
                discordCountWidgetElement.innerHTML = `${data.presence_count} en ligne`;

                data.members.forEach(member => {
                    const userDiv = document.createElement('div');
                    userDiv.className = 'hydaria-discordUser';
                    userDiv.innerHTML = `
                        <div class="hydaria-userImg" style="background-image:url(${member.avatar_url})">
                            <div class="hydaria-userStatus hydaria-status-${member.status}"></div>
                        </div>
                        <div class="hydaria-username">${member.username}</div>
                    `;
                    discordWidgetContainer.appendChild(userDiv);
                });
            });
    }
});
