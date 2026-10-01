{{-- Public-page financial activity examples. These are clearly identified as examples:
     never display generated names or amounts as confirmed platform transactions. --}}
<style>
    #wb-sample-activity[hidden] { display: none !important; }
    #wb-sample-activity {
        position: fixed;
        top: 82px;
        right: 16px;
        width: min(310px, calc(100vw - 24px));
        z-index: 2147483000;
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        pointer-events: none;
    }
    #wb-sample-activity .wb-activity-card {
        pointer-events: auto;
        background: #111827;
        border: 1px solid #4b5563;
        border-left: 3px solid #60a5fa;
        border-radius: 12px;
        padding: 12px 14px;
        box-shadow: 0 12px 28px rgba(0,0,0,.24);
        color: #f9fafb;
        line-height: 1.4;
        animation: wb-sample-in .2s ease-out both;
    }
    #wb-sample-activity .wb-activity-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        margin-bottom: 6px;
    }
    #wb-sample-activity .wb-activity-label {
        font-weight: 700;
        font-size: 11px;
        letter-spacing: .035em;
        color: #93c5fd;
        text-transform: uppercase;
    }
    #wb-sample-activity .wb-activity-close {
        cursor: pointer;
        border: 0;
        background: transparent;
        color: #d1d5db;
        font-size: 20px;
        line-height: 1;
        padding: 2px 5px;
        border-radius: 4px;
    }
    #wb-sample-activity .wb-activity-close:hover,
    #wb-sample-activity .wb-activity-close:focus-visible {
        background: #374151;
        color: white;
        outline-offset: 2px;
    }
    #wb-sample-activity .wb-activity-message {
        font-size: 13px;
        font-weight: 600;
        margin: 0 0 5px;
        color: #f9fafb;
    }
    #wb-sample-activity .wb-activity-disclosure {
        display: block;
        font-size: 11px;
        color: #d1d5db;
        line-height: 1.35;
    }
    @keyframes wb-sample-in {
        from { opacity: 0; transform: translateY(-8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @media (max-width: 640px) {
        #wb-sample-activity { top: 70px; right: 12px; }
    }
    @media (prefers-reduced-motion: reduce) {
        #wb-sample-activity .wb-activity-card { animation: none; }
    }
</style>
<div id="wb-sample-activity" hidden aria-live="polite" aria-atomic="true">
    <section class="wb-activity-card" aria-label="Illustrative financial activity">
        <div class="wb-activity-heading">
            <span class="wb-activity-label" id="wb-sample-activity-kind">Activity example</span>
            <button type="button" class="wb-activity-close" id="wb-sample-activity-close" aria-label="Hide illustrative activity examples">&times;</button>
        </div>
        <p class="wb-activity-message" id="wb-sample-activity-message"></p>
        <small class="wb-activity-disclosure">Sample activity · Not live transactions.</small>
    </section>
</div>
<script>
(function () {
    'use strict';

    function initializeIllustrativeActivity() {
        var container = document.getElementById('wb-sample-activity');
        var kind = document.getElementById('wb-sample-activity-kind');
        var message = document.getElementById('wb-sample-activity-message');
        var close = document.getElementById('wb-sample-activity-close');
        if (!container || !kind || !message || !close) return;

        // Each example persona yields a deposit, withdrawal and investment
        // example: 50 x 3 = 150 different activity variations per cycle.
        // This list intentionally contains no African countries.
        var people = [
            ['David', 'Australia'], ['John', 'United States'],
            ['Emma', 'Canada'], ['Oliver', 'United Kingdom'],
            ['Sophia', 'Germany'], ['Lucas', 'France'],
            ['Amelia', 'Italy'], ['Liam', 'Spain'],
            ['Isabella', 'Netherlands'], ['Noah', 'Belgium'],
            ['Mia', 'Switzerland'], ['Ethan', 'Norway'],
            ['Charlotte', 'Sweden'], ['William', 'Denmark'],
            ['Ava', 'Finland'], ['James', 'Poland'],
            ['Emily', 'Portugal'], ['Benjamin', 'Ireland'],
            ['Ella', 'Austria'], ['Henry', 'New Zealand'],
            ['Sakura', 'Japan'], ['Jisoo', 'South Korea'],
            ['Arjun', 'India'], ['Mei', 'Singapore'],
            ['Wei', 'China'], ['Fatima', 'United Arab Emirates'],
            ['Omar', 'Saudi Arabia'], ['Hana', 'Qatar'],
            ['Maria', 'Philippines'], ['Niran', 'Thailand'],
            ['Aisha', 'Malaysia'], ['Putri', 'Indonesia'],
            ['Gabriel', 'Brazil'], ['Valentina', 'Argentina'],
            ['Diego', 'Mexico'], ['Camila', 'Chile'],
            ['Santiago', 'Colombia'], ['Lucia', 'Peru'],
            ['Mateo', 'Uruguay'], ['Olivia', 'Jamaica'],
            ['Adrian', 'Trinidad and Tobago'], ['Chloe', 'Barbados'],
            ['Daniel', 'Czech Republic'], ['Elena', 'Greece'],
            ['Alex', 'Romania'], ['Yuki', 'Japan'],
            ['Sophie', 'Luxembourg'], ['Maya', 'United States'],
            ['Jack', 'Australia'], ['Grace', 'Canada']
        ];

        // Minimums (USD): deposit 500, withdrawal 5,000, investment 500.
        // The sample generator imposes no upper-bound check.
        var actions = [
            { kind: 'Deposit example', minimum: 500, increment: 875,
              phrases: [function (amount) { return 'deposited ' + amount; },
                        function (amount) { return 'made a deposit of ' + amount; },
                        function (amount) { return 'added ' + amount + ' to an account'; }] },
            { kind: 'Withdrawal example', minimum: 5000, increment: 2400,
              phrases: [function (amount) { return 'withdrew ' + amount; },
                        function (amount) { return 'completed a withdrawal of ' + amount; },
                        function (amount) { return 'made a withdrawal of ' + amount; }] },
            { kind: 'Investment example', minimum: 500, increment: 1375,
              phrases: [function (amount) { return 'invested ' + amount; },
                        function (amount) { return 'made an investment of ' + amount; },
                        function (amount) { return 'allocated ' + amount + ' to an investment'; }] }
        ];

        var deck = [];
        var cycle = 0;
        var timer = null;
        var stopped = false;

        try { stopped = sessionStorage.getItem('wb-hide-illustrative-activity') === '1'; }
        catch (error) { /* Private browsing may disallow session storage. */ }
        if (stopped) return;

        function reshuffle() {
            deck = [];
            for (var p = 0; p < people.length; p++) {
                for (var a = 0; a < actions.length; a++) deck.push({ person: p, action: a });
            }
            // Fisher-Yates: all 150 combinations appear before any repeat.
            for (var i = deck.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                var temp = deck[i];
                deck[i] = deck[j];
                deck[j] = temp;
            }
            cycle++;
        }

        function schedule(delay) {
            if (timer) clearTimeout(timer);
            if (!stopped) timer = setTimeout(showNext, delay);
        }

        function showNext() {
            if (stopped) return;
            if (document.hidden) { schedule(3000); return; }
            if (!deck.length) reshuffle();

            var sample = deck.pop();
            var person = people[sample.person];
            var action = actions[sample.action];
            // Starting at the minimum for the first participant in each category.
            // Each subsequent cycle can produce larger examples, with no fixed cap.
            var amount = action.minimum + action.increment *
                (sample.person + ((cycle - 1) * people.length));
            var amountText = '$' + new Intl.NumberFormat('en-US', {
                maximumFractionDigits: 0
            }).format(amount);

            kind.textContent = 'Sample activity · ' + action.kind;
            message.textContent = person[0] + ' from ' + person[1] + ' ' +
                action.phrases[sample.person % action.phrases.length](amountText) + '.';
            container.hidden = false;

            // Hide the current example before scheduling the next one.
            if (timer) clearTimeout(timer);
            timer = setTimeout(function () {
                container.hidden = true;
                schedule(13000);
            }, 6500);
        }

        close.addEventListener('click', function () {
            stopped = true;
            container.hidden = true;
            if (timer) clearTimeout(timer);
            try { sessionStorage.setItem('wb-hide-illustrative-activity', '1'); }
            catch (error) { /* The current page still honours the dismissal. */ }
        });

        schedule(9000);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeIllustrativeActivity);
    } else {
        initializeIllustrativeActivity();
    }
})();
</script>
