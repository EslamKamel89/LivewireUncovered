document.querySelectorAll("[wire\\:snapshot]").forEach((el) => {
    let snapshot = JSON.parse(el.getAttribute("wire:snapshot"));
    el.addEventListener("click", (e) => {
        if (!e.target.hasAttribute("wire:click")) return;
        let method = e.target.getAttribute("wire:click");
        fetch("/api/live", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                snapshot: snapshot,
                callMethod: method,
            }),
        });
    });
});
