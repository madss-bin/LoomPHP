<dialog id="command-palette" class="command-dialog" aria-label="Command menu" onclick="if (event.target===this)this.close()">
    <div class="command">
        <header><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8" /><path d="m21 21-4.3-4.3" /></svg>
            <input type="text" id="command-palette-input" placeholder="Type a command or search..." autocomplete="off" autocorrect="off" spellcheck="false" aria-autocomplete="list" role="combobox" aria-expanded="true" aria-controls="command-palette-menu" />
        </header>
        <div role="menu" id="command-palette-menu" aria-orientation="vertical" data-empty="No results found.">
            <div role="group" aria-labelledby="cmd-nav">
                <span role="heading" id="cmd-nav">Navigation</span>
                <div role="menuitem" data-filter="Home" onclick="location.href='/';this.closest('dialog').close()"><svg class="lucide lucide-home" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" /><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" /></svg><span>Home</span></div>

                <div role="menuitem" data-filter="Docs" onclick="location.href='/docs';this.closest('dialog').close()"><svg class="lucide lucide-book-open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg><span>Docs</span></div>
            </div>
            <hr role="separator" />
            <div role="group" aria-labelledby="cmd-actions">
                <span role="heading" id="cmd-actions">Actions</span>
                <div role="menuitem" data-keep-command-open data-filter="Toggle Dark Mode" data-keywords="theme dark light" onclick="var r=document.documentElement;var d=r.classList.toggle('dark');try{localStorage.setItem('themeMode',d?'dark':'light')}catch(e){};this.closest('dialog').close()"><svg class="lucide lucide-moon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.985 12.486a9 9 0 1 1-9.473-9.472c.405-.022.617.46.402.803a6 6 0 0 0 8.268 8.268c.344-.215.825-.004.803.401" /></svg><span>Toggle Dark Mode</span></div>
            </div>
        </div>
    </div>
</dialog>
