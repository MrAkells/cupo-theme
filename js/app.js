"use strict";
let bodyLockStatus = true;
let bodyLockToggle = (delay = 500) => {
    if (document.documentElement.classList.contains("lock")) bodyUnlock(delay);
    else bodyLock(delay);
};
let bodyUnlock = (delay = 500) => {
    if (bodyLockStatus) {
        const lockPaddingElements = document.querySelectorAll("[data-lp]");
        setTimeout(() => {
            lockPaddingElements.forEach((lockPaddingElement) => {
                lockPaddingElement.style.paddingRight = "";
            });
            document.body.style.paddingRight = "";
            document.documentElement.classList.remove("lock");
        }, delay);
        bodyLockStatus = false;
        setTimeout(function () {
            bodyLockStatus = true;
        }, delay);
    }
};
let bodyLock = (delay = 500) => {
    if (bodyLockStatus) {
        const lockPaddingElements = document.querySelectorAll("[data-lp]");
        const lockPaddingValue = window.innerWidth - document.body.offsetWidth + "px";
        lockPaddingElements.forEach((lockPaddingElement) => {
            lockPaddingElement.style.paddingRight = lockPaddingValue;
        });
        document.body.style.paddingRight = lockPaddingValue;
        document.documentElement.classList.add("lock");
        bodyLockStatus = false;
        setTimeout(function () {
            bodyLockStatus = true;
        }, delay);
    }
};

function menuInit() {
    if (document.querySelector(".icon-menu"))
        document.addEventListener("click", function (e) {
            if (bodyLockStatus && e.target.closest(".icon-menu")) {
                bodyLockToggle();
                document.documentElement.classList.toggle("menu-open");
            }
        });
}

function removeClasses(array, className) {
    for (var i = 0; i < array.length; i++) array[i].classList.remove(className);
}

function uniqArray(array) {
    return array.filter(function (item, index, self) {
        return self.indexOf(item) === index;
    });
}

function dataMediaQueries(array, dataSetValue) {
    const media = Array.from(array).filter(function (item, index, self) {
        if (item.dataset[dataSetValue]) return item.dataset[dataSetValue].split(",")[0];
    });
    if (media.length) {
        const breakpointsArray = [];
        media.forEach((item) => {
            const params = item.dataset[dataSetValue];
            const breakpoint = {};
            const paramsArray = params.split(",");
            breakpoint.value = paramsArray[0];
            breakpoint.type = paramsArray[1] ? paramsArray[1].trim() : "max";
            breakpoint.item = item;
            breakpointsArray.push(breakpoint);
        });
        let mdQueries = breakpointsArray.map(function (item) {
            return "(" + item.type + "-width: " + item.value + "px)," + item.value + "," + item.type;
        });
        mdQueries = uniqArray(mdQueries);
        const mdQueriesArray = [];
        if (mdQueries.length) {
            mdQueries.forEach((breakpoint) => {
                const paramsArray = breakpoint.split(",");
                const mediaBreakpoint = paramsArray[1];
                const mediaType = paramsArray[2];
                const matchMedia = window.matchMedia(paramsArray[0]);
                const itemsArray = breakpointsArray.filter(function (item) {
                    if (item.value === mediaBreakpoint && item.type === mediaType) return true;
                });
                mdQueriesArray.push({
                    itemsArray,
                    matchMedia,
                });
            });
            return mdQueriesArray;
        }
    }
}

let addWindowScrollEvent = false;
setTimeout(() => {
    if (addWindowScrollEvent) {
        let windowScroll = new Event("windowScroll");
        window.addEventListener("scroll", function (e) {
            document.dispatchEvent(windowScroll);
        });
    }
}, 0);

class DynamicAdapt {
    constructor(type) {
        this.type = type;
    }

    init() {
        this.оbjects = [];
        this.daClassname = "_dynamic_adapt_";
        this.nodes = [...document.querySelectorAll("[data-da]")];
        this.nodes.forEach((node) => {
            const data = node.dataset.da.trim();
            const dataArray = data.split(",");
            const оbject = {};
            оbject.element = node;
            оbject.parent = node.parentNode;
            оbject.destination = document.querySelector(`${dataArray[0].trim()}`);
            оbject.breakpoint = dataArray[1] ? dataArray[1].trim() : "767.98";
            оbject.place = dataArray[2] ? dataArray[2].trim() : "last";
            оbject.index = this.indexInParent(оbject.parent, оbject.element);
            this.оbjects.push(оbject);
        });
        this.arraySort(this.оbjects);
        this.mediaQueries = this.оbjects
            .map(({ breakpoint }) => `(${this.type}-width: ${breakpoint / 16}em),${breakpoint}`)
            .filter((item, index, self) => self.indexOf(item) === index);
        this.mediaQueries.forEach((media) => {
            const mediaSplit = media.split(",");
            const matchMedia = window.matchMedia(mediaSplit[0]);
            const mediaBreakpoint = mediaSplit[1];
            const оbjectsFilter = this.оbjects.filter(({ breakpoint }) => breakpoint === mediaBreakpoint);
            matchMedia.addEventListener("change", () => {
                this.mediaHandler(matchMedia, оbjectsFilter);
            });
            this.mediaHandler(matchMedia, оbjectsFilter);
        });
    }

    mediaHandler(matchMedia, оbjects) {
        if (matchMedia.matches)
            оbjects.forEach((оbject) => {
                this.moveTo(оbject.place, оbject.element, оbject.destination);
            });
        else
            оbjects.forEach(({ parent, element, index }) => {
                if (element.classList.contains(this.daClassname)) this.moveBack(parent, element, index);
            });
    }

    moveTo(place, element, destination) {
        element.classList.add(this.daClassname);
        if (place === "last" || place >= destination.children.length) {
            destination.append(element);
            return;
        }
        if (place === "first") {
            destination.prepend(element);
            return;
        }
        destination.children[place].before(element);
    }

    moveBack(parent, element, index) {
        element.classList.remove(this.daClassname);
        if (parent.children[index] !== void 0) parent.children[index].before(element);
        else parent.append(element);
    }

    indexInParent(parent, element) {
        return [...parent.children].indexOf(element);
    }

    arraySort(arr) {
        if (this.type === "min")
            arr.sort((a, b) => {
                if (a.breakpoint === b.breakpoint) {
                    if (a.place === b.place) return 0;
                    if (a.place === "first" || b.place === "last") return -1;
                    if (a.place === "last" || b.place === "first") return 1;
                    return 0;
                }
                return a.breakpoint - b.breakpoint;
            });
        else {
            arr.sort((a, b) => {
                if (a.breakpoint === b.breakpoint) {
                    if (a.place === b.place) return 0;
                    if (a.place === "first" || b.place === "last") return 1;
                    if (a.place === "last" || b.place === "first") return -1;
                    return 0;
                }
                return b.breakpoint - a.breakpoint;
            });
            return;
        }
    }
}

const da = new DynamicAdapt("max");
da.init();
document.addEventListener("click", (e) => {
    const targetElement = e.target;
    if (targetElement.closest(".languages__current")) targetElement.closest(".languages").classList.toggle("open-lang");
    if (!targetElement.closest(".languages__current"))
        removeClasses(document.querySelectorAll(".languages.open-lang"), "open-lang");
});
menuInit();

function headerScroll() {
    addWindowScrollEvent = true;
    const header = document.querySelector('header.header');
    const headerShow = header.hasAttribute('data-scroll-show');
    const headerShowTimer = header.dataset.scrollShow ? header.dataset.scrollShow : 500;
    const startPoint = header.dataset.scroll ? header.dataset.scroll : 1;
    let scrollDirection = 0;
    let timer;
    document.addEventListener("windowScroll", function (e) {
        const scrollTop = window.scrollY;
        clearTimeout(timer);
        if (scrollTop >= startPoint) {
            !header.classList.contains('_header-scroll') ? header.classList.add('_header-scroll') : null;
            if (headerShow) {
                if (scrollTop > scrollDirection) {
                    // downscroll code
                    header.classList.contains('_header-show') ? header.classList.remove('_header-show') : null;
                } else {
                    // upscroll code
                    !header.classList.contains('_header-show') ? header.classList.add('_header-show') : null;
                }
                timer = setTimeout(() => {
                    !header.classList.contains('_header-show') ? header.classList.add('_header-show') : null;
                }, headerShowTimer);
            }
        } else {
            header.classList.contains('_header-scroll') ? header.classList.remove('_header-scroll') : null;
            if (headerShow) {
                header.classList.contains('_header-show') ? header.classList.remove('_header-show') : null;
            }
        }
        scrollDirection = scrollTop <= 0 ? 0 : scrollTop;
    });
};
headerScroll();
document.querySelectorAll('.spollers__title').forEach((header, index) => {
    header.addEventListener('click', () => {
        const content = document.getElementById(header.getAttribute('aria-controls'));
        const isExpanded = header.getAttribute('aria-expanded') === 'true';
        document.querySelectorAll('.spollers__title').forEach(otherHeader => {
            if (otherHeader !== header) {
                otherHeader.classList.remove('_spoller-active');
                otherHeader.setAttribute('aria-expanded', 'false');
                const otherContent = document.getElementById(otherHeader.getAttribute('aria-controls'));
                otherContent.setAttribute('aria-hidden', 'true');
                otherContent.style.display = 'none';
            }
        });
        if (!isExpanded) {
            header.classList.add('_spoller-active');
            header.setAttribute('aria-expanded', 'true');
            content.setAttribute('aria-hidden', 'false');
            content.style.display = 'block';
        }
    });
    if (index === 0) {
        header.classList.add('_spoller-active');
        header.setAttribute('aria-expanded', 'true');
        const content = document.getElementById(header.getAttribute('aria-controls'));
        content.setAttribute('aria-hidden', 'false');
        content.style.display = 'block';
    }
});


document.addEventListener('DOMContentLoaded', function () {
    // Находим все элементы с классом 'open-popup'
    var popupTriggers = document.querySelectorAll('.open-popup');

    // Добавляем обработчик события для каждого элемента
    popupTriggers.forEach(function (trigger) {
        trigger.addEventListener('click', function (e) {
            e.preventDefault(); // Предотвращаем действие по умолчанию для ссылок
            openPopup();
        });
    });

    // Функция открытия попапа
    function openPopup() {
        document.body.classList.add('popup-open');
        document.getElementById('popupOverlay').classList.add('active');
    }

    // Функция закрытия попапа
    function closePopup() {
        document.body.classList.remove('popup-open');
        document.getElementById('popupOverlay').classList.remove('active');
    }

    // Обработчик для кнопки отмены
    document.querySelector('.button-cancel').addEventListener('click', function (e) {
        e.preventDefault();
        closePopup();
    });

    // Закрытие попапа при клике вне формы
    document.getElementById('popupOverlay').addEventListener('click', function (e) {
        if (e.target === this) {
            closePopup();
        }
    });

    // Предотвращаем закрытие попапа при клике на его содержимое
    document.querySelector('.popup-content').addEventListener('click', function (e) {
        e.stopPropagation();
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var phoneInput = document.getElementById('phone');
    if (phoneInput) {
        var phoneMaskOptions = {
            mask: [
                {
                    mask: '+0 (000) 000-00-00',
                    startsWith: '7',
                    lazy: false,
                    country: 'Russia'
                },
                {
                    mask: '+000 (00) 000-00-00',
                    startsWith: '380',
                    lazy: false,
                    country: 'Ukraine'
                },
                {
                    mask: '+0 000 000-00-00',
                    startsWith: '1',
                    lazy: false,
                    country: 'USA'
                },
                {
                    mask: '+00 000 000-00-00',
                    startsWith: '86',
                    lazy: false,
                    country: 'China'
                },
                {
                    mask: '+00 (000) 000-00-00',
                    startsWith: '34',
                    lazy: false,
                    country: 'Spain'
                },
                {
                    mask: '+000 00 000 00 00',
                    startsWith: '',
                    lazy: false,
                    country: 'Other'
                }
            ],
            dispatch: function (appended, dynamicMasked) {
                var number = (dynamicMasked.value + appended).replace(/\D/g, '');

                return dynamicMasked.compiledMasks.find(function (m) {
                    return number.indexOf(m.startsWith) === 0;
                }) || this.dynamicMasked.compiledMasks[this.dynamicMasked.compiledMasks.length - 1];
            }
        };

        var phoneMask = IMask(phoneInput, phoneMaskOptions);
    }
});