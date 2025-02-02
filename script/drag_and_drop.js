document.addEventListener('DOMContentLoaded', function() {
    var draggables = document.querySelectorAll('.draggable');
    var containers = document.querySelectorAll('.container');

    draggables.forEach(function(draggable) {
        draggable.addEventListener('dragstart', function() {
            draggable.classList.add('dragging');
        });

        draggable.addEventListener('dragend', function() {
            draggable.classList.remove('dragging');
        });
    });

    containers.forEach(function(container) {
        container.addEventListener('dragover', function(e) {
            e.preventDefault();
            var afterElement = getDragAfterElement(container, e.clientY);
            var draggable = document.querySelector('.dragging');
            if (afterElement == null) {
                container.appendChild(draggable);
            } else {
                container.insertBefore(draggable, afterElement);
            }
        });
    });

    function getDragAfterElement(container, y) {
        var draggableElements = Array.prototype.slice.call(container.querySelectorAll('.draggable:not(.dragging)'));

        return draggableElements.reduce(function(closest, child) {
            var box = child.getBoundingClientRect();
            var offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
});