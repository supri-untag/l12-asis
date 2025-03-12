import './bootstrap';
import.meta.glob([
    '../assets/media/**',
])
    export default {
        showLoading: () => {
            document.body.prepend(document.createElement("div"));
            document.createElement("div").classList.add("page-loader");
            document.createElement("div").classList.add("flex-column");
            document.createElement("div").innerHTML = `
                    <span class="spinner-border text-primary" role="status"></span>
                    <span class="text-muted fs-6 fw-semibold mt-5">Loading...</span>
            `;
        },
        hideLoading: () => {
            document.createElement("div").remove();
        },
    }


