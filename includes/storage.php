<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage NETMIX
 * @since NETMIX 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'netmix_storage_get' ) ) {
	function netmix_storage_get( $var_name, $default = '' ) {
		global $NETMIX_STORAGE;
		return isset( $NETMIX_STORAGE[ $var_name ] ) ? $NETMIX_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'netmix_storage_set' ) ) {
	function netmix_storage_set( $var_name, $value ) {
		global $NETMIX_STORAGE;
		$NETMIX_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'netmix_storage_empty' ) ) {
	function netmix_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $NETMIX_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $NETMIX_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $NETMIX_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $NETMIX_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'netmix_storage_isset' ) ) {
	function netmix_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $NETMIX_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $NETMIX_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $NETMIX_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $NETMIX_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'netmix_storage_inc' ) ) {
	function netmix_storage_inc( $var_name, $value = 1 ) {
		global $NETMIX_STORAGE;
		if ( empty( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = 0;
		}
		$NETMIX_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'netmix_storage_concat' ) ) {
	function netmix_storage_concat( $var_name, $value ) {
		global $NETMIX_STORAGE;
		if ( empty( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = '';
		}
		$NETMIX_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'netmix_storage_get_array' ) ) {
	function netmix_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $NETMIX_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $NETMIX_STORAGE[ $var_name ][ $key ] ) ? $NETMIX_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $NETMIX_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $NETMIX_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'netmix_storage_set_array' ) ) {
	function netmix_storage_set_array( $var_name, $key, $value ) {
		global $NETMIX_STORAGE;
		if ( ! isset( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$NETMIX_STORAGE[ $var_name ][] = $value;
		} else {
			$NETMIX_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'netmix_storage_set_array2' ) ) {
	function netmix_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $NETMIX_STORAGE;
		if ( ! isset( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $NETMIX_STORAGE[ $var_name ][ $key ] ) ) {
			$NETMIX_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$NETMIX_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$NETMIX_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'netmix_storage_merge_array' ) ) {
	function netmix_storage_merge_array( $var_name, $key, $value ) {
		global $NETMIX_STORAGE;
		if ( ! isset( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$NETMIX_STORAGE[ $var_name ] = array_merge( $NETMIX_STORAGE[ $var_name ], $value );
		} else {
			$NETMIX_STORAGE[ $var_name ][ $key ] = array_merge( $NETMIX_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'netmix_storage_set_array_after' ) ) {
	function netmix_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $NETMIX_STORAGE;
		if ( ! isset( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			netmix_array_insert_after( $NETMIX_STORAGE[ $var_name ], $after, $key );
		} else {
			netmix_array_insert_after( $NETMIX_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'netmix_storage_set_array_before' ) ) {
	function netmix_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $NETMIX_STORAGE;
		if ( ! isset( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			netmix_array_insert_before( $NETMIX_STORAGE[ $var_name ], $before, $key );
		} else {
			netmix_array_insert_before( $NETMIX_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'netmix_storage_push_array' ) ) {
	function netmix_storage_push_array( $var_name, $key, $value ) {
		global $NETMIX_STORAGE;
		if ( ! isset( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $NETMIX_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $NETMIX_STORAGE[ $var_name ][ $key ] ) ) {
				$NETMIX_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $NETMIX_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'netmix_storage_pop_array' ) ) {
	function netmix_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $NETMIX_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $NETMIX_STORAGE[ $var_name ] ) && is_array( $NETMIX_STORAGE[ $var_name ] ) && count( $NETMIX_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $NETMIX_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $NETMIX_STORAGE[ $var_name ][ $key ] ) && is_array( $NETMIX_STORAGE[ $var_name ][ $key ] ) && count( $NETMIX_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $NETMIX_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'netmix_storage_inc_array' ) ) {
	function netmix_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $NETMIX_STORAGE;
		if ( ! isset( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = array();
		}
		if ( empty( $NETMIX_STORAGE[ $var_name ][ $key ] ) ) {
			$NETMIX_STORAGE[ $var_name ][ $key ] = 0;
		}
		$NETMIX_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'netmix_storage_concat_array' ) ) {
	function netmix_storage_concat_array( $var_name, $key, $value ) {
		global $NETMIX_STORAGE;
		if ( ! isset( $NETMIX_STORAGE[ $var_name ] ) ) {
			$NETMIX_STORAGE[ $var_name ] = array();
		}
		if ( empty( $NETMIX_STORAGE[ $var_name ][ $key ] ) ) {
			$NETMIX_STORAGE[ $var_name ][ $key ] = '';
		}
		$NETMIX_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'netmix_storage_call_obj_method' ) ) {
	function netmix_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $NETMIX_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $NETMIX_STORAGE[ $var_name ] ) ? $NETMIX_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $NETMIX_STORAGE[ $var_name ] ) ? $NETMIX_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'netmix_storage_get_obj_property' ) ) {
	function netmix_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $NETMIX_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $NETMIX_STORAGE[ $var_name ]->$prop ) ? $NETMIX_STORAGE[ $var_name ]->$prop : $default;
	}
}
