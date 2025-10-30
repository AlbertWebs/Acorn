@extends('layouts.master')

@section('content')

    <div class="space-for-header"></div>
    <!-- start: Breadcrumb Section -->
    <section class="tj-page-header section-gap-x" data-bg-image="{{asset('uploads/ubuntu.webp')}}">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="tj-page-header-content text-center">
                <h1 class="tj-page-title">Our Calendar</h1>
                <div class="tj-page-link">
                <span><i class="tji-home"></i></span>
                <span>
                    <a href="{{url('/')}}">Home</a>
                </span>
                <span><i class="tji-arrow-right"></i></span>
                <span>
                    <span>Our Calendar</span>
                </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="page-header-overlay" data-bg-image="{{asset('acorn/assets/images/shape/pheader-overlay.webp')}}"></div>
    </section>
    <!-- end: Breadcrumb Section -->

    <section class="section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="p-4 rounded border calendar-panel shadow-lg">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <button id="prevMonth" class="tj-primary-btn" type="button">
                                <span class="btn-text"><span>Prev</span></span>
                                <span class="btn-icon"><i class="tji-arrow-left-long"></i></span>
                            </button>
                            <h4 id="monthLabel" class="mb-0"></h4>
                            <button id="nextMonth" class="tj-primary-btn" type="button">
                                <span class="btn-text"><span>Next</span></span>
                                <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </button>
                        </div>

                        <div class="calendar-grid">
                            <div class="calendar-header">Sun</div>
                            <div class="calendar-header">Mon</div>
                            <div class="calendar-header">Tue</div>
                            <div class="calendar-header">Wed</div>
                            <div class="calendar-header">Thu</div>
                            <div class="calendar-header">Fri</div>
                            <div class="calendar-header">Sat</div>
                            <div id="calendarDays" class="calendar-days"></div>
                        </div>
                        <div class="calendar-legend d-flex align-items-center gap-3 mt-3">
                            <span class="legend-item d-inline-flex align-items-center gap-2"><span class="legend-dot"></span> Event</span>
                            <span class="legend-item d-inline-flex align-items-center gap-2"><span class="legend-selected"></span> Selected</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="p-4 rounded border sidebar-panel shadow-lg">
                        <h4 class="mb-3" id="selectedDateLabel">Select a date</h4>
                        <div id="eventsList">
                            <p class="text-muted">Click on a date to view events. If no events exist, you can book an appointment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        :root{--cal-accent:#efb21e;--cal-accent-weak:rgba(239,178,30,0.12);--cal-accent-border:rgba(239,178,30,0.55)}
        .calendar-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:8px}
        .calendar-header{font-weight:700;text-align:center;padding:8px 0;color:#444}
        .calendar-days{display:contents}
        .day{border:1px solid #eee;border-radius:10px;min-height:82px;padding:8px;cursor:pointer;display:flex;flex-direction:column;background:#fff;transition:.2s ease}
        .day.disabled{opacity:.35;cursor:default}
        .day:hover{box-shadow:0 6px 18px rgba(0,0,0,.06);transform:translateY(-1px)}
        .day-number{font-weight:700;color:#333}
        .event-dot{width:8px;height:8px;border-radius:50%;background:var(--cal-accent);margin-top:auto;align-self:flex-end;box-shadow:0 0 0 3px rgba(239,178,30,0.18)}
        .day.selected{border-color:var(--cal-accent); box-shadow: inset 0 0 0 2px rgba(239,178,30,0.25), 0 6px 18px rgba(0,0,0,.06)}
        .day.has-events{background:var(--cal-accent-weak);border-color:var(--cal-accent-border)}
        .calendar-legend .legend-dot{display:inline-block;width:10px;height:10px;border-radius:50%;background:var(--cal-accent);box-shadow:0 0 0 3px rgba(239,178,30,0.18)}
        .calendar-legend .legend-selected{display:inline-block;width:14px;height:14px;border-radius:6px;border:2px solid var(--cal-accent)}
        .calendar-panel{background:linear-gradient(180deg,#ffffff, #faf9f6)}
        .sidebar-panel{background:linear-gradient(180deg,#ffffff, #fbfbfb)}
        @media (max-width: 576px){.day{min-height:64px;padding:8px}.calendar-grid{gap:6px}}
        /* smaller button for events list */
        #eventsList .event-card{background:#fff;border:1px solid #eee;border-radius:12px;padding:10px 12px}
        #eventsList .tj-primary-btn.btn-sm{padding:6px 12px;font-size:12px;line-height:1.2;border-radius:999px}
        #eventsList .tj-primary-btn.btn-sm .btn-text span{font-size:12px}
        #eventsList .tj-primary-btn.btn-sm .btn-icon i{font-size:12px}
        #eventsList .slots{display:flex;flex-wrap:wrap;gap:10px;margin-top:12px}
        #eventsList .slot{border:1px solid #e5e5e5;border-radius:999px;padding:8px 14px;font-size:12px;cursor:pointer;text-decoration:none;color:#333;background:#fff;transition:.2s ease}
        #eventsList .slot:hover{border-color:var(--cal-accent);color:#000;box-shadow:0 2px 10px rgba(0,0,0,.06)}
        #eventsList .slot.inactive{background:#f7f7f7;color:#999;border-color:#ececec;cursor:not-allowed;pointer-events:none;box-shadow:none}
        #eventsList .slot.available{border-color:#e8f4e8;color:#256029;background:#f5fff5}
    </style>

    @php
        $eventsForCalendar = $events->map(function($e){
            return [
                'id' => $e->id,
                'title' => $e->title,
                'slug' => $e->slug,
                'date' => $e->event_date ? \Carbon\Carbon::parse($e->event_date)->toDateString() : ($e->created_at ? $e->created_at->toDateString() : null),
                'image' => $e->featured_image ? asset('storage/'.$e->featured_image) : null,
                'time' => isset($e->event_time) && $e->event_time ? substr($e->event_time, 0, 5) : null,
            ];
        })->values();
    @endphp

    <script>
    document.addEventListener('DOMContentLoaded', function(){
        // Events from backend (using created_at as date)
        const events = @json($eventsForCalendar);
        const initialDate = @json(request('date'));

        // Normalize event dates to YYYY-MM-DD
        const eventByDate = events.reduce((acc, ev) => {
            const d = (ev.date || '').slice(0,10);
            if(!acc[d]) acc[d] = [];
            acc[d].push(ev);
            return acc;
        }, {});

        const monthLabel = document.getElementById('monthLabel');
        const calendarDays = document.getElementById('calendarDays');
        const prevBtn = document.getElementById('prevMonth');
        const nextBtn = document.getElementById('nextMonth');
        const selectedDateLabel = document.getElementById('selectedDateLabel');
        const eventsList = document.getElementById('eventsList');

        let current = new Date();
        current.setDate(1);
        let selectedDate = null; // YYYY-MM-DD

        function formatDateKey(dt){
            const y = dt.getFullYear();
            const m = String(dt.getMonth()+1).padStart(2,'0');
            const d = String(dt.getDate()).padStart(2,'0');
            return `${y}-${m}-${d}`;
        }

        function renderMonth(){
            const y = current.getFullYear();
            const m = current.getMonth();
            const monthName = current.toLocaleString('default',{month:'long'});
            monthLabel.textContent = `${monthName} ${y}`;

            calendarDays.innerHTML = '';
            const firstDayIdx = new Date(y, m, 1).getDay();
            const daysInMonth = new Date(y, m+1, 0).getDate();
            const prevMonthDays = new Date(y, m, 0).getDate();

            // leading blanks from previous month
            for(let i=0;i<firstDayIdx;i++){
                const dayNum = prevMonthDays - firstDayIdx + 1 + i;
                const cell = document.createElement('div');
                cell.className = 'day disabled';
                cell.innerHTML = `<div class="day-number">${dayNum}</div>`;
                calendarDays.appendChild(cell);
            }

            // days of current month
            for(let d=1; d<=daysInMonth; d++){
                const cellDate = new Date(y, m, d);
                const cellKey = formatDateKey(cellDate);
                const hasEvents = !!eventByDate[cellKey];
                const cell = document.createElement('div');
                cell.className = 'day' + (hasEvents ? ' has-events' : '') + (selectedDate === cellKey ? ' selected' : '');
                cell.setAttribute('data-date', cellKey);
                cell.innerHTML = `<div class="day-number">${d}</div>` + (hasEvents ? '<span class="event-dot"></span>' : '');
                cell.addEventListener('click', () => {
                    selectedDate = cellKey;
                    selectDate(cellKey);
                    highlightSelected();
                });
                calendarDays.appendChild(cell);
            }

            // trailing to fill grid to full weeks (optional)
            const totalCells = firstDayIdx + daysInMonth;
            const trailing = (7 - (totalCells % 7)) % 7;
            for(let i=1;i<=trailing;i++){
                const cell = document.createElement('div');
                cell.className = 'day disabled';
                cell.innerHTML = `<div class=\"day-number\">${i}</div>`;
                calendarDays.appendChild(cell);
            }
        }

        function highlightSelected(){
            const nodes = calendarDays.querySelectorAll('.day');
            nodes.forEach(n => {
                const d = n.getAttribute('data-date');
                if (!d) return;
                if (d === selectedDate) {
                    n.classList.add('selected');
                } else {
                    n.classList.remove('selected');
                }
            });
        }

        function selectDate(dateStr){
            // Label without timezone issues
            const [yy, mm, dd] = dateStr.split('-').map(Number);
            const labelDate = new Date(yy || 1970, (mm || 1) - 1, dd || 1);
            selectedDateLabel.textContent = labelDate.toLocaleDateString(undefined, { weekday:'long', year:'numeric', month:'long', day:'numeric' });

            const list = eventByDate[dateStr] || [];

            // Build event cards
            const eventsHtml = list.map(ev => `
                <div class="d-flex gap-3 align-items-start mb-3 event-card">
                    ${ev.image ? `<img src="${ev.image}" alt="${ev.title}" style="width:64px;height:64px;object-fit:cover;border-radius:6px;">` : ''}
                    <div>
                        <h6 class="mb-1">${ev.title}</h6>
                        <p class="text-muted mb-2" style="font-size:12px">${ev.time ? ev.time : 'All day'}</p>
                        <a class="tj-primary-btn btn-sm" href="{{ url('/events') }}/${ev.slug}">
                            <span class="btn-text"><span>View & Book</span></span>
                            <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </a>
                    </div>
                </div>
            `).join('');

            // Appointment slots (07:00 - 18:00 hourly) with inactive for booked or past times
            const slots = generateSlots(dateStr);
            const bookedTimes = list.map(ev => ev.time).filter(Boolean);
            const bookedHourSet = new Set(bookedTimes.map(t => `${t.slice(0,2)}:00`));
            const slotsHtml = `
                <div class="mt-3">
                    <h6 class="mb-2">Available appointment hours</h6>
                    <div class="slots">
                        ${slots.map(t => {
                            const isBooked = bookedHourSet.has(t);
                            const isPast = isPastSlot(dateStr, t);
                            if (isBooked || isPast) {
                                const reason = isBooked ? 'Booked' : 'Past';
                                return `<span class=\"slot inactive\" title=\"${reason}\">${t}</span>`;
                            }
                            return `<a class=\"slot available\" href=\"{{ route('book-consultation') }}?date=${dateStr}&time=${t}\">${t}</a>`;
                        }).join('')}
                    </div>
                </div>
            `;

            if(list.length === 0){
                eventsList.innerHTML = `
                    <div class="text-center py-3">
                        <p class="mb-3">No events on this date.</p>
                        <a class="tj-primary-btn" href="{{ route('book-consultation') }}?date=${dateStr}">
                            <span class="btn-text"><span>Book Appointment</span></span>
                            <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </a>
                    </div>
                    ${slotsHtml}
                `;
                return;
            }

            eventsList.innerHTML = eventsHtml + slotsHtml;
        }

        function generateSlots(dateStr){
            const startHour = 7; // 07:00
            const endHour = 18; // exclusive end boundary (last slot at 17:00)
            const slots = [];
            for(let h=startHour; h<endHour; h++){
                slots.push(`${String(h).padStart(2,'0')}:00`);
            }
            return slots;
        }

        function isPastSlot(dateStr, timeStr){
            const [yy, mm, dd] = dateStr.split('-').map(Number);
            const [hh, mi] = timeStr.split(':').map(Number);
            const slotDate = new Date(yy, (mm||1)-1, dd||1, hh||0, mi||0, 0, 0);
            const now = new Date();
            // 15 min buffer
            return slotDate.getTime() <= (now.getTime() + 15*60*1000);
        }

        prevBtn.addEventListener('click', () => { current.setMonth(current.getMonth()-1); renderMonth(); });
        nextBtn.addEventListener('click', () => { current.setMonth(current.getMonth()+1); renderMonth(); });

        // Initialize month based on initialDate or today
        let init = new Date();
        if (initialDate) {
            const parts = initialDate.split('-');
            if (parts.length === 3) {
                const y = parseInt(parts[0], 10);
                const m = parseInt(parts[1], 10) - 1;
                const d = parseInt(parts[2], 10);
                const parsed = new Date(y, m, d);
                if (!isNaN(parsed.getTime())) {
                    init = parsed;
                }
            }
        }
        current = new Date(init.getFullYear(), init.getMonth(), 1);
        selectedDate = formatDateKey(init);
        renderMonth();
        selectDate(selectedDate);
        highlightSelected();
    });
    </script>

@endsection


