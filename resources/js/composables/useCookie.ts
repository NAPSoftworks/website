type CookieConsent = { local_analytics: boolean, google: boolean };

export function hasGoogleConsent(): boolean {
    const cookieConsent: CookieConsent | null = JSON.parse(localStorage.getItem('cookieConsent') as string) ?? null;

    return cookieConsent?.google ?? false;
}
