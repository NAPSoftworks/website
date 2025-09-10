export function formatDate(dateString: string) {
    const date = new Date(dateString);

    return date.getMonth() + 1 + '/' + date.getDate() + '/' + date.getFullYear();
}
