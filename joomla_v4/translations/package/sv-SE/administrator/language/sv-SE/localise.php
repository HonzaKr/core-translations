<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * sv-SE localise class.
 *
 * @since  1.6
 */
abstract class Sv_SELocalise {    //// !!!! NOTE the use of Sv_SE for the class !!!  // not the same as your language prefix.
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param	int $count  The number of items.
	 * @return	array  An array of potential suffixes.
	 * @since	1.6
	 */
	public static function getPluralSuffixes($count) {
		if ($count == 0) {
			$return =  array('0');
		}
		elseif($count == 1) {
			$return =  array('1');
		}
		else {
			$return = array('MORE');  // Beware, this will be added to a language KEY. It should be in ascii and Uppercase.
		}
		return $return;
	}
	/**
	 * Returns the ignored search words
	 *
	 * @return	array  An array of ignored search words.
	 * @since	1.6
	 */
	public static function getIgnoredSearchWords() {
		$search_ignore = array();
		$search_ignore[] = "och";
		$search_ignore[] = "i";
		$search_ignore[] = "på";
		return $search_ignore;
	}
	/**
	 * Returns the lower length limit of search words
	 *
	 * @return	integer  The lower length limit of search words.
	 * @since	1.6
	 */
	public static function getLowerLimitSearchWord() {
		return 3;
	}
	/**
	 * Returns the upper length limit of search words
	 *
	 * @return	integer  The upper length limit of search words.
	 * @since	1.6
	 */
	public static function getUpperLimitSearchWord() {
		return 20;
	}
	/**
	 * Returns the number of chars to display when searching
	 *
	 * @return	integer  The number of chars to display when searching.
	 * @since	1.6
	 */
	public static function getSearchDisplayedCharactersNumber() {
		return 200;
	}
}


/**
	 * This method processes a string and replaces all accented UTF-8 characters by unaccented
	 * ASCII-7 "equivalents"
	 *
	 * @param	string	$string	The string to transliterate
	 * @return	string	The transliteration of the string
	 * @since	1.6
	 */
	public static function transliterate($string)
		{
		$str = \Joomla\String\StringHelper::strtolower($string); // since 3.8.0 to prepare 4.0

		//Specific language transliteration.
		//This one is for latin 1, latin supplement , extended A, Cyrillic, Greek

		$glyph_array = array(
		'a'		=>	'a,à,á,â,ã,ä,å,ā,ă,ą,ḁ,α,ά',
		'ae'	=>	'æ',
		'b'		=>	'β,б',
		'c'		=>	'c,ç,ć,ĉ,ċ,č,ћ,ц',
		'ch'	=>	'ч',
		'd'		=>	'ď,đ,Ð,д,ђ,δ,ð',
		'dz'	=>	'џ',
		'e'		=>	'e,è,é,ê,ë,ē,ĕ,ė,ę,ě,э,ε,έ',
		'f'		=>	'ƒ,ф',
		'g'		=>	'ğ,ĝ,ğ,ġ,ģ,г,γ',
		'h'		=>	'ĥ,ħ,Ħ,х',
		'i'		=>	'i,ì,í,î,ï,ı,ĩ,ī,ĭ,į,и,й,ъ,ы,ь,η,ή',
		'ij'	=>	'ĳ',
		'j'		=>	'ĵ,j',
		'ja'	=>	'я',
		'ju'	=>	'яю',
		'k'		=>	'ķ,ĸ,κ',
		'l'		=>	'ĺ,ļ,ľ,ŀ,ł,л,λ',
		'lj'	=>	'љ',
		'm'		=>	'μ,м',
		'n'		=>	'ñ,ņ,ň,ŉ,ŋ,н,ν',
		'nj'	=>	'њ',
		'o'		=>	'ò,ó,ô,õ,ø,ō,ŏ,ő,ο,ό,ω,ώ,ö',
		'oe'	=>	'œ',
		'p'		=>	'п,π',
		'ph'	=>	'φ',
		'ps'	=>	'ψ',
		'r'		=>	'ŕ,ŗ,ř,р,ρ,σ,ς',
		's'		=>	'ş,ś,ŝ,ş,š,с',
		'ss'	=>	'ß,ſ',
		'sh'	=>	'ш',
		'shch'	=>	'щ',
		't'		=>	'ţ,ť,ŧ,τ,т',
		'th'	=>	'θ',
		'u'		=>	'u,ù,ú,û,ü,ũ,ū,ŭ,ů,ű,ų,у',
		'v'		=>	'в',
		'w'		=>	'ŵ',
		'x'		=>	'χ,ξ',
		'y'		=>	'ý,þ,ÿ,ŷ',
		'z'		=>	'ź,ż,ž,з,ж,ζ'
		);

		foreach( $glyph_array as $letter => $glyphs ) {
			$glyphs = explode( ',', $glyphs );
			$str = str_replace( $glyphs, $letter, $str );
		}

		return $str;
		}
}
