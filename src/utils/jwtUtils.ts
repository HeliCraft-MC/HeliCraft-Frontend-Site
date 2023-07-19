import jwt from 'jsonwebtoken';
import { JWT_SECRET, JWT_EXPIRES_IN } from '../config/main';

/**
 * Checks if a token is valid.
 *
 * @param {string} token - The token to be verified.
 * @return {boolean} Returns true if the token is valid, false otherwise.
 */
export function isTokenValid(token: string): boolean {
    try {
        jwt.verify(token, JWT_SECRET);
        return true;
    } catch (error) {
        return false;
    }
}

/**
 * Creates a token with the given nickname.
 *
 * @param {string} nickname - The nickname to be included in the token.
 * @return {string} - The created token.
 */
export function createToken(nickname: string): string {
    return jwt.sign({ nickname }, JWT_SECRET, { expiresIn: '' + JWT_EXPIRES_IN + '' });
}